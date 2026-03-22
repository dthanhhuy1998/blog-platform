<?php

namespace App\Enums;

class PageStatus
{
    const ACTIVE = 1;
    const INACTIVE = 2;

    public static function all(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
        ];
    }

    public static function options(): array
    {
        return [
            self::ACTIVE => __('Active'),
            self::INACTIVE => __('Inactive'),
        ];
    }

    public static function label(string $key, string $default = ''): string
    {
        return self::options()[$key] ?? $default;
    }
}
