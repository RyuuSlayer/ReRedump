<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SystemPermission extends Model
{
    protected $table = 'system_permissions';

    protected $fillable = [
        'user_id',
        'permission_id',
        'system_id',
    ];

    /**
     * Get the user that owns the system permission.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the permission associated with this system permission.
     */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * Get the system associated with this permission.
     */
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
