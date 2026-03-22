<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_category';

    public function article() {
        return $this->belongsToMany(Article::class, 'article_to_category', 'category_id', 'article_id');
    }
}
