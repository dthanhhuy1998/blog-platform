<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductImage;

class PageProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'page_products';

    protected $fillable = [
        'sku','image','quantity','stock_status_id','original_price','price','quantity','point','shopee_link','date_available','viewed',
        'display','featured','status'
    ];

    public function categories()
    {
        return $this->belongsToMany(PageCategory::class, 'page_product_to_category', 'product_id', 'category_id');
    }

    public function description()
    {
        return $this->hasOne(PageProductDescription::class, 'product_id', 'id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')->where('page_id', '<>', 0);
    }
}
