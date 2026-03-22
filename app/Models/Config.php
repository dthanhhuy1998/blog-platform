<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'configs';

    protected $fillable = [
        'conf_key',
        'conf_value',
    ];

    public $timestamps = false;

    static function getConfig($key)
    {
        $config = Config::where('conf_key', $key)->first();
        return $config->conf_value;
    }

    static function getAllConfig() {
        $configs = Config::all();

        $result = [];
        if (count($configs) > 0) {
            foreach ($configs as $config) {
                $result[$config->conf_key] = $config->conf_value;
            }
        }

        return $result;
    }

}
