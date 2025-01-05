<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the system-specific permissions for the user.
     */
    public function systemPermissions(): HasMany
    {
        return $this->hasMany(SystemPermission::class);
    }

    /**
     * Check if user has permission for a specific system
     */
    public function hasSystemPermission(string $permission, ?int $systemId = null): bool
    {
        // Check for all-systems permission first
        if ($this->hasPermissionTo($permission . '_all')) {
            return true;
        }

        // If no system specified, only allow if user has all-systems permission
        if ($systemId === null) {
            return false;
        }

        // Check for system-specific permission
        return $this->permissions()
            ->join('system_permissions', 'permissions.id', '=', 'system_permissions.permission_id')
            ->where('permissions.name', $permission)
            ->where('system_permissions.system_id', $systemId)
            ->exists();
    }

    /**
     * Grant system-specific permission to user
     */
    public function giveSystemPermission(string $permission, int $systemId): void
    {
        $perm = Permission::firstOrCreate(['name' => $permission]);
        
        \DB::table('system_permissions')->insertOrIgnore([
            'permission_id' => $perm->id,
            'system_id' => $systemId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->permissions()->syncWithoutDetaching([$perm->id]);
    }
}
