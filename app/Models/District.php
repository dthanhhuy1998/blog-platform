<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'devvn_quanhuyen';

    protected $primaryKey = 'maqh';
    protected $keyType = 'string';

    // Model Helpers
    public static function isExists($code) {
        if (District::where('maqh', trim($code))->exists()) {
            $district = District::where('maqh', trim($code))->first();
            return $district->maqh;
        }

        return '';
    }
}
