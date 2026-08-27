<?php

namespace App\Services;

use App\Models\ModuleSettings;
use App\Models\Role;
use Illuminate\Support\Facades\Schema;

final readonly class ModuleSettingsInitializer
{
    public function __construct(
        private ModulePermissionService $permissions,
        private ModuleSettingsService $settings,
    ) {}

    /**
     * @param string $moduleName
     * @param string $moduleId
     * @return ModuleSettings|null
     */
    public function initialize(
        string $moduleName,
        string $moduleId
    ): ?ModuleSettings {
        if (! Schema::hasTable('roles') || ! Schema::hasTable('module_settings')) {
            return null;
        }

        $availablePermissions = $this->permissions->get($moduleName);

        if ($availablePermissions === []) {
            return $this->settings->get($moduleId);
        }

        $defaults = $this->normalizeDefaults(
            $this->permissions->getDefaults($moduleName),
            $availablePermissions,
        );

        $moduleSettings = $this->settings->get($moduleId);
        $current = $moduleSettings->getSettings();

        $mergedPermissions = $this->mergePermissions(
            $current['permissions'] ?? [],
            $defaults,
            $availablePermissions,
        );

        if (($current['permissions'] ?? []) === $mergedPermissions) {
            return $moduleSettings;
        }

        $current['permissions'] = $mergedPermissions;

        $moduleSettings->update(['settings' => $current]);

        return $moduleSettings->refresh();
    }

    /**
     * @param array<int|string, array<string, bool>> $defaults
     * @param array<string> $availablePermissions
     * @return array<string, array<string, bool>>
     */
    private function normalizeDefaults(array $defaults, array $availablePermissions): array
    {
        $roleIdsByTitle = Role::query()
            ->pluck('id', 'title')
            ->mapWithKeys(fn ($id, string $title) => [$title => (string) $id])
            ->all();

        $normalized = [];

        foreach ($defaults as $role => $rolePermissions) {
            $roleId = is_numeric($role)
                ? (string) $role
                : ($roleIdsByTitle[$role] ?? null);

            if ($roleId === null || $roleId === '0') {
                continue;
            }

            foreach ($availablePermissions as $permission) {
                $normalized[$roleId][$permission] = (bool) ($rolePermissions[$permission] ?? false);
            }
        }

        return $normalized;
    }

    /**
     * @param array<string, array<string, bool>> $current
     * @param array<string, array<string, bool>> $defaults
     * @param array<string> $availablePermissions
     * @return array<string, array<string, bool>>
     */
    private function mergePermissions(
        array $current,
        array $defaults,
        array $availablePermissions,
    ): array {
        foreach ($defaults as $roleId => $rolePermissions) {
            foreach ($availablePermissions as $permission) {
                if (! array_key_exists($permission, $current[$roleId] ?? [])) {
                    $current[$roleId][$permission] = $rolePermissions[$permission] ?? false;
                }
            }
        }

        return $current;
    }
}
