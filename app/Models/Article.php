<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    protected $guard = [];

    public function category() {
        return $this->belongsToMany(ArticleCategory::class, 'article_to_category', 'article_id', 'category_id');
    }
}
