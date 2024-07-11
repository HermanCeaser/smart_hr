<?php

namespace App\Models;

use App\Enums\MaritalStatus;
use App\Traits\HasTenant;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    use HasFactory, HasTenant;

    protected $appends = ['full_name'];
    protected $guarded = [];

    protected $casts = [
        'marital_status' => MaritalStatus::class
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getForm(): array
    {
        return [];
    }


    public static function getEmployeeId($tenantID)
    {

        $current_year = date('Y');
        $tenantCode = session('tenant_code') ?? Filament::getTenant()->short_code ?? "META";
        $tenantCodeLength = strlen($tenantCode);
        $year_start_index = $tenantCodeLength + 1;
        $short_year = substr($current_year, -2);

        $start_index = $tenantCodeLength + 7;
        $query = DB::table('staff')
            ->selectRaw("max(CAST(substring(employee_id, $start_index) as UNSIGNED)) as maxNo")
            ->where('tenant_id', $tenantID)
            ->whereRaw("substring(employee_id, $year_start_index, 2) = '$short_year'")
            ->first();

        $maxNo = $query->maxNo ?? 0;
        $nextEmpID = $maxNo + 1;
        $empID = $tenantCode . now()->format('y') . 'EMP-' . sprintf('%04d', $nextEmpID);

        $staffExists = DB::table('staff')->where('tenant_id', $tenantID)->where('employee_id', $empID)->first();
        if ($staffExists) {
            $exploded = explode('-', $empID);
            //Get the last inserted employee id that has the format 'EFS21STF'
            $lastInsertedStaff = DB::table('staff')
                ->where('tenant_id', $tenantID)
                ->where('employee_id', 'like', '%'.$exploded[0].'-%')
                ->orderBy('id', 'desc')
                ->first(['id', 'employee_id', 'first_name', 'last_name']);

            if ($lastInsertedStaff) {
                $empID = $lastInsertedStaff->employee_id;
                $exploded = explode('-', $empID);

                $next_id = (int) $exploded[1] + 1;
                $empID = $exploded[0].'-'.sprintf('%04d', $next_id);
            }
        }

        return $empID;
    }
}
