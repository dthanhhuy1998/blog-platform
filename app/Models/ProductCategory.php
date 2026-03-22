<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_category';

    public function products() {
        return $this->belongsToMany(Product::class, 'product_to_category', 'category_id', 'product_id');
    }

    public function toProductPivot() {
        return $this->hasMany(ProductToCategory::class, 'category_id', 'id');
    }

    public function product() {
        return $this->hasOne(Product::class,'id', 'product_id');
    }
}
