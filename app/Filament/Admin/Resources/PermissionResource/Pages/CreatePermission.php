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

        $data['guard_name'] = 'web';

        $permission = static::getModel()::withoutEvents(fn() => static::getModel()::create($data));

        
        return $permission;
    }

}
