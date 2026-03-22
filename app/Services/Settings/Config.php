<?php

namespace App\Services\Settings;
use App\Models\Config as ConfigModel;

class Config
{
    public static function get($key)
    {
        $config = ConfigModel::where('conf_key', $key)->first();
        return $config->conf_value ?? null;
    }
}