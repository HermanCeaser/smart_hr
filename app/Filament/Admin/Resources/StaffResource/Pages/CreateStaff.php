<?php

namespace App\Filament\Admin\Resources\StaffResource\Pages;

use App\Filament\Admin\Resources\StaffResource;
use App\Models\User;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected ?bool $hasDatabaseTransactions = true;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {

        $user = User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt('password'),
            'is_active' => true
        ]);

        $user->tenants()->attach(session('tenant_id'));

        $current_year = date('Y');
        $tenantCode = session('tenant_code') ?? Filament::getTenant()->short_code ?? "META";
        $tenantCodeLength = strlen($tenantCode);
        $year_start_index = $tenantCodeLength + 1;
        $short_year = substr($current_year, -2);

        $start_index = $tenantCodeLength + 7;
        $query = DB::table('staff')
            ->selectRaw("max(CAST(substring(employee_id, $start_index) as UNSIGNED)) as maxNo")
            ->where('tenant_id', session('tenant_id'))
            ->whereRaw("substring(employee_id, $year_start_index, 2) = '$short_year'")
            ->first();

        $maxNo = $query->maxNo ?? 0;
        $nextEmpID = $maxNo + 1;

        $data['user_id'] = $user->id;
        $data['employee_id'] = $tenantCode . now()->format('y') . 'EMP-' . sprintf('%04d', $nextEmpID);

        $staff = static::getModel()::create($data);
        return $staff;
    }
}
