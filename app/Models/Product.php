<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    const FORSALE = 1;
    const STOP_SELLING = 0;

    // Relationshops
    public function productDescription() {
        return $this->belongsTo(ProductDescription::class, 'id', 'product_id');
    }

    public function stockStatus() {
        return $this->belongsTo(ProductStatus::class, 'stock_status_id', 'id');
    }

    public function toCategory() {
        return $this->belongsToMany(ProductCategory::class, 'product_to_category', 'product_id', 'category_id');
    }

    public function toGroup() {
        return $this->belongsToMany(ProductGroup::class, 'product_to_group', 'product_id', 'group_id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')
            ->where(function ($q) {
                $q->where('page_id', 0)
                ->orWhereNull('page_id');
            });
    }
}
