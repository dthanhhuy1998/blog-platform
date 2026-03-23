<?php 

namespace App\Modules\Blog\Services;

use App\Modules\Blog\Repositories\PostRepository;

class PostService {
    public function __construct(private PostRepository $postRepository) {}

    public function getPostTotal(string $status)
    {
        return $this->postRepository->getPostTotal($status);
    }
}
