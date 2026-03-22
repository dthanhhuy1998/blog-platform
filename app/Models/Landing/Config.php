<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'lp_configs';

    protected $fillable = [
        'page_id',
        'config_key',
        'config_value',
    ];
}
