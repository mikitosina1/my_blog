<?php

namespace App\Contracts;

use App\Models\User;

/**
 * Provides base for verification of rights Contract
 */
interface ModuleAuthorization
{
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
    ): bool;
}
