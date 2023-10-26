<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
    use HasFactory;

    public function userPermission(): BelongsTo
    {
        return $this->belongsTo(UserPermission::class);
    }

    public function rolePermission(): BelongsTo
    {
        return $this->belongsTo(RolePermission::class);
    }
}
