<?php

namespace App\Modules\Blog\Repositories;

use App\Modules\Blog\Models\PostCategory;

class PostCategoryRepository {
    
    public function getAllCategory()
    {
        return PostCategory::all();
    }

    public function create(array $data)
    {
        return PostCategory::create($data);
    }

    public function find($id)
    {
        return PostCategory::find($id);
    }

    public function update(int $id, array $data)
    {
        return PostCategory::where('id', $id)->update($data);
    }

    public function delete(int $id)
    {
        return PostCategory::where('id', $id)->delete();
    }

    public function checkExistsBySlug(string $slug)
    {
        return PostCategory::where('slug', $slug)->exists();
    }

    public function getCategoryBySlug(string $slug)
    {
        return PostCategory::where('slug', $slug)->first();
    }
}