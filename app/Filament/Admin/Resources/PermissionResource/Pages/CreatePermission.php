<?php

namespace App\Filament\Admin\Resources\PermissionResource\Pages;

use App\Filament\Admin\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // dd($data);
        $data['guard_name'] = 'web';

        // dd($data);
        $permission = static::getModel()::withoutEvents(fn() => static::getModel()::create($data));

        
        return $permission;
    }

}
