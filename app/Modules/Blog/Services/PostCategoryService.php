<?php 

namespace App\Modules\Blog\Services;

use App\Modules\Blog\Repositories\PostCategoryRepository;

class PostCategoryService {
    public function __construct(private PostCategoryRepository $postCategoryRepository) {}

    public function getAllCategory()
    {
        return $this->postCategoryRepository->getAllCategory();
    }

    public function create(array $data)
    {
        $this->postCategoryRepository->create($data);
    }

    public function find($id)
    {
        return $this->postCategoryRepository->find($id);
    }

    public function update(int $id, array $data)
    {
        $this->postCategoryRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->postCategoryRepository->delete($id);
    }
}
