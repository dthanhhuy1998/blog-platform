<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * cái này dùng pivot ấy
 */
class ProductToCategory extends Model
{
    use HasFactory;

    protected $table = 'product_to_category';

    public function product() {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
