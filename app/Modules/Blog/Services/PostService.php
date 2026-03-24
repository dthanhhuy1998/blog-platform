<?php 

namespace App\Modules\Blog\Services;

use App\Modules\Blog\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

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
        $data['created_by'] = Auth::id();
        $data['created_at'] = date('Y-m-d H:i:s');

        return $this->postRepository->store($data);
    }

    public function update(int $id, array $data)
    {
        $data['updated_by'] = Auth::id();
        $data['updated_at'] = date('Y-m-d H:i:s');

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
