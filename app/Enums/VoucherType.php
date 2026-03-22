<?php

namespace App\Enums;

class VoucherType
{
    const PERCENT = 'percent';
    const FIXED = 'fixed';

    public static function all(): array
    {
        return [
            self::PERCENT,
            self::FIXED,
        ];
    }

    public static function options(): array
    {
        return [
            self::PERCENT => __('Percent'),
            self::FIXED => __('Fixed'),
        ];
    }

    public static function label(string $key, string $default = ''): string
    {
        return self::options()[$key] ?? $default;
    }
}
