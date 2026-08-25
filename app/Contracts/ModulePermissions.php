<?php

namespace App\Contracts;

/**
 * Provides base for rights announcing Contract
 */
interface ModulePermissions
{
    /**
     * @return array<string>
     */
    public static function all(): array;

    /**
     * @return array<int|string, array<string, bool>>
     */
    public static function defaults(): array;
}