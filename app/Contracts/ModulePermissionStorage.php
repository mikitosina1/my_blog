<?php

namespace App\Contracts;

interface ModulePermissionStorage
{
    /**
     * @param string $module
     * @param int $roleId
     * @param string $permission
     * @return bool
     */
    public function allows(
        string $module,
        int $roleId,
        string $permission,
    ): bool;
}