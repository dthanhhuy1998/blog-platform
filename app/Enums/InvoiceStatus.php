<?php

namespace App\Enums;

class InvoiceStatus
{
    const PENDING = 'pending';
    const SUCCESS = 'success';
    const CANCEL = 'cancel';

    public static function all(): array
    {
        return [
            self::PENDING,
            self::SUCCESS,
            self::CANCEL
        ];
    }

    public static function options(): array
    {
        return [
            self::PENDING => __('Peding'),
            self::SUCCESS => __('Success'),
            self::CANCEL => __('Cancel'),
        ];
    }

    public static function label(string $key, string $default = ''): string
    {
        return self::options()[$key] ?? $default;
    }
}
