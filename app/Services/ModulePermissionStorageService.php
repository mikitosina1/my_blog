<?php

namespace App\Services;

use App\Contracts\ModulePermissionStorage;

final readonly class ModulePermissionStorageService implements ModulePermissionStorage
{
    public function __construct(
        private ModuleSettingsService $settings,
    ) {}

    public function allows(
        string $module,
        int $roleId,
        string $permission,
    ): bool {
        $settings = $this->settings->get($module)->getSettings();

        return (bool) (
            $settings['permissions'][(string) $roleId][$permission]
            ?? false
        );
    }
}
