<?php

namespace App\Filament\Admin\Resources\StaffResource\Pages;

use App\Filament\Admin\Resources\StaffResource;
use App\Models\Staff;
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

        $tenantId = session('tenant_id') ?? Filament::getTenant()->id;
        $data['user_id'] = $user->id;
        $data['employee_id'] = static::getModel()::getEmployeeId($tenantId);
        $data['tenant_id'] = $tenantId;

        $staff = static::getModel()::create($data);
        return $staff;
    }
}
