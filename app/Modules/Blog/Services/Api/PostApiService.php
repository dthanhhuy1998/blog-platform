<?php

namespace App\Modules\Blog\Services\Api;

use App\Modules\Blog\Repositories\PostRepository;
use App\Modules\Blog\Resources\PostApiResource;

class PostApiService
{
    public function __construct(
        protected PostRepository $repo
    ) {}

    public function getLatestPosts(array $filters = [])
    {
        $limit = isset($filters['limit']) ? $filters['limit'] : 10;

        $posts = $this->repo->getLatestPosts($limit);
        
        return PostApiResource::collection($posts);
    }
}
