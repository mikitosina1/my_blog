<?php

namespace App\Services;

use App\Contracts\ModuleAuthorization;
use App\Contracts\ModulePermissionStorage;
use App\Models\User;

final readonly class ModuleAuthorizationService implements ModuleAuthorization
{
    /**
     * @param ModulePermissionStorage $storage
     */
    public function __construct(
        private ModulePermissionStorage $storage,
    ) {}

    /**
     * @param User $user
     * @param string $module
     * @param string $permission
     * @return bool
     */
    public function allows(
        User $user,
        string $module,
        string $permission,
    ): bool {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->storage->allows(
            $module,
            $user->role_id,
            $permission,
        );
    }
}