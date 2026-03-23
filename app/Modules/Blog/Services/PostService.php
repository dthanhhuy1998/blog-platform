<?php 

namespace App\Modules\Blog\Services;

use App\Modules\Blog\Repositories\PostRepository;

class PostService {
    public function __construct(private PostRepository $postRepository) {}

    public function getAllPost()
    {
        return $this->postRepository->getAllPost();
    }

    public function getPostTotal(string $status)
    {
        return $this->postRepository->getPostTotal($status);
    }

    public function getPostById(string $postId)
    {
        return $this->postRepository->getPostById($postId);
    }

    public function store(array $data)
    {
        return $this->postRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->postRepository->destroy($id);
    }

    public function getLatestPost()
    {
        return $this->postRepository->getLatestPost();
    }

    public function getLatestPosts($limit = 5, $excludeIds = [])
    {
        return $this->postRepository->getLatestPosts($limit, $excludeIds);
    }
}
