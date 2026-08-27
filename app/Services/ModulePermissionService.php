<?php

namespace App\Services;

use App\Contracts\ModulePermissions;

final class ModulePermissionService
{
    /**
     * @return array<string>
     */
    public function get(string $moduleName): array
    {
        $class = $this->resolveClass($moduleName);

        if ($class === null) {
            return [];
        }

        return $class::all();
    }

    /**
     * @return array<int|string, array<string, bool>>
     */
    public function getDefaults(string $moduleName): array
    {
        $class = $this->resolveClass($moduleName);

        if ($class === null) {
            return [];
        }

        return $class::defaults();
    }

    /**
     * @return class-string<ModulePermissions>|null
     */
    private function resolveClass(string $moduleName): ?string
    {
        $class = sprintf(
            'Modules\\%s\\App\\Permissions\\%sPermissions',
            $moduleName,
            $moduleName,
        );

        if (! class_exists($class)) {
            return null;
        }

        if (! is_subclass_of($class, ModulePermissions::class)) {
            return null;
        }

        return $class;
    }
}
