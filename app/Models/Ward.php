<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'devvn_xaphuongthitran';

    protected $primaryKey = 'xaid';
    protected $keyType = 'string';

    // Model Helpers
    public static function isExists($code) {
        if (Ward::where('xaid', trim($code))->exists()) {
            $ward = Ward::where('xaid', trim($code))->first();
            return $ward->xaid;
        }

        return '';
    }
}
