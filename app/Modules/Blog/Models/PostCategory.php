<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'article_category';
    
    protected $fillable = [
        'image',
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'parent_id',
        'sort_order',
        'status',
    ];

    public function posts() {
        return $this->belongsToMany(Post::class, 'article_to_category', 'category_id', 'article_id');
    }

    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id')->withDefault(['name' => '']);
    }
}
