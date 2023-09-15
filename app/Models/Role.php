<?php

namespace App\Models;

use App\Traits\HasTenant;
use Spatie\Permission\Models\Role AS BaseRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends BaseRole
{
    use HasFactory;
    use HasTenant;

    protected $dates = ['deleted_at'];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
