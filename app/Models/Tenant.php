<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'contact_person',
        'address',
        'country',
        'city',
        'state',
        'postal_code',
        'email',
        'phone_number',
        'mobile_number',
        'fax',
        'website_url',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_user');
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function designations(): HasMany
    {
        return $this->hasMany(Designation::class);
    }


    protected function displayFormat(): Attribute
    {
        $mappings = [
            'd' => 'dd',
            'm' => 'mm',
            'Y' => 'yyyy',
            'y' => 'yy',
        ];

        return Attribute::make(
            get: fn (mixed $value, array $attributes)  => strtr($attributes['date_format'], $mappings),
        )->shouldCache();
    }
}
