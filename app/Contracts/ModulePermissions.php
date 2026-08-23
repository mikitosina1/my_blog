<?php

namespace App\Contracts;

interface ModulePermissions
{
    /**
     * @return array<string>
     */
    public static function all(): array;
}