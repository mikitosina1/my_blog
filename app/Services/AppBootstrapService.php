<?php

namespace App\Services;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;
use JsonException;

class AppBootstrapService
{
    /**
     * @throws FileNotFoundException
     * @throws JsonException
     */
    public function get(): array
    {
        return [
            'locale' => app()->getLocale(),

            'translations' => [
                'core' => $this->getCoreTranslations(),
            ],

            'modules' => $this->getModuleTranslations(),
        ];
    }

    private function getCoreTranslations(): array
    {
        return [
            'aside' => trans('aside'),
            'home' => trans('home'),
            'about' => trans('about'),
            'basic' => trans('basic'),
            'user_cloud' => trans('user_cloud'),
        ];
    }

    /**
     * @throws FileNotFoundException
     * @throws JsonException
     */
    private function getModuleTranslations(): array
    {
        $translations = [];

        foreach ($this->getEnabledModules() as $moduleName) {
            $module = $this->getModuleDefinition($moduleName);

            if ($module === null) {
                continue;
            }

            $moduleTranslations = $this->loadModuleTranslations(
                $moduleName
            );

            if ($moduleTranslations === []) {
                continue;
            }

            $translations[$module['alias']] = $moduleTranslations;
        }

        return $translations;
    }

    /**
     * @throws FileNotFoundException
     * @throws JsonException
     */
    private function getEnabledModules(): array
    {
        $path = base_path('modules_statuses.json');

        if (!File::exists($path)) {
            return [];
        }

        $statuses = json_decode(
            File::get($path),
            true,
            flags: JSON_THROW_ON_ERROR,
        );

        return array_keys(
            array_filter(
                $statuses,
                static fn (bool $enabled): bool => $enabled,
            ),
        );
    }

    /**
     * @throws FileNotFoundException
     * @throws JsonException
     */
    private function getModuleDefinition(string $moduleName): ?array
    {
        $path = module_path($moduleName, 'module.json');

        if (!File::exists($path)) {
            return null;
        }

        $module = json_decode(
            File::get($path),
            true,
            flags: JSON_THROW_ON_ERROR,
        );

        return is_array($module) ? $module : null;
    }

    private function loadModuleTranslations(string $moduleName): array
    {
        $locale = app()->getLocale();

        $path = module_path(
            $moduleName,
            "resources/lang/{$locale}",
        );

        if (!File::isDirectory($path)) {
            return [];
        }

        $translations = [];

        foreach (File::files($path) as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $data = require $file->getRealPath();

            if (!is_array($data)) {
                continue;
            }

            $translations = array_replace_recursive(
                $translations,
                $data,
            );
        }

        return $translations;
    }
}