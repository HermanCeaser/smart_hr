<?php

namespace App\Traits;


trait HasTenant
{
    public static function bootAppendTrait()
    {

        static::addGlobalScope(new \App\Models\Scopes\TenantScope);
    }
}
