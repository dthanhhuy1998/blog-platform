<?php

namespace App\Models\Landing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageProductDescription extends Model
{
    use HasFactory;

    protected $table = 'page_product_descriptions';

    protected $fillable = [
        'product_id','name','slug','description','detail','tag','meta_title','meta_description','meta_keyword'
    ];

    public $timestamps = false;
}
