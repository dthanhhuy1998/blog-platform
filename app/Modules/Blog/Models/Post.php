<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Blog\Models\PostCategory;
use App\Modules\User\Models\User;

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
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function categories() {
        return $this->belongsToMany(PostCategory::class, 'article_to_category', 'article_id', 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault(['name' => 'Anonymous']);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id')->withDefault(['name' => 'Anonymous']);
    }
}
