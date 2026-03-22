<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'devvn_tinhthanhpho';

    protected $primaryKey = 'matp';
    protected $keyType = 'string';

    protected $fillable = [
        'matp',
        'name',
    ];

    // Model Helpers
    public static function isExists($code) {
        if (Province::where('matp', trim($code))->exists()) {
            $province = Province::where('matp', trim($code))->first();
            return $province->matp;
        }

        return '';
    }
}
