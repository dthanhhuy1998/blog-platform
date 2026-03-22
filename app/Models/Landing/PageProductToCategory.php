<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageProductToCategory extends Model
{
    use HasFactory;

    protected $table = 'page_product_to_category';

    protected $fillable = ['product_id', 'category_id'];
}
    