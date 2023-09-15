<?php

namespace App\Models;

use App\Traits\HasTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use HasFactory, HasTenant;

    protected $fillable = ['name', 'slug', 'module', 'created_at', 'updated_at'];

    protected $dates = ['deleted_at'];

    
}
