<?php

namespace App\Modules\Blog\Repositories;

use App\Modules\Blog\Models\Post;

class PostRepository {
    public function getPostTotal(string $status)
    {
        return Post::where('status', $status)->count();
    }
}