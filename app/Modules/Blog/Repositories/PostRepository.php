<?php

namespace App\Modules\Blog\Repositories;

use App\Modules\Blog\Models\Post;

class PostRepository {
    
    public function getAllPost()
    {
        return Post::all();
    }
    
    public function getPostTotal(string $status)
    {
        return Post::where('status', $status)->count();
    }

    public function getPostById(string $postId)
    {
        return Post::find($postId);
    }

    public function store(array $data)
    {
        return Post::create($data);
    }

    public function update(int $id, array $data)
    {
        return Post::where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        return Post::where('id', $id)->delete();
    }

    public function getLatestPost()
    {
        return Post::orderBy('created_at', 'desc')->first();
    }

    public function getLatestPosts($limit = 5, $excludeIds = [])
    {
        if (empty($excludeIds)) {
            return Post::orderBy('created_at', 'desc')->limit($limit)->get();
        }

        return Post::orderBy('created_at', 'desc')->limit($limit)->whereNotIn('id', $excludeIds)->get();
    }
}