<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Blog\Models\PostCategory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $fillable = [
        'image',
        'title',
        'slug',
        'summary',
        'content',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'sort_order',
        'status',
    ];

    public function category() {
        return $this->belongsToMany(PostCategory::class, 'article_to_category', 'article_id', 'category_id');
    }
}
