<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionSystem extends Model
{
    use HasFactory;

    protected $table = 'distribution_systems';

    public function provice()
    {
        return $this->belongsTo(Province::class, 'matp', 'related_city_code');
    }
}
