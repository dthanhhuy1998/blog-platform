<?php 

namespace App\Modules\Blog\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Modules\Blog\Services\PostCategoryService;
use App\Modules\Blog\Services\PostService;
use App\Helpers\SEOHelper;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    public function __construct(
        private PostCategoryService $categoryService,
        private PostService $postService
    ) {}

    public function show($locale, $slug)
    {
        if (!$this->categoryService->checkExistsBySlug($slug)) {
            abort(404);
        }
        
        $category = $this->categoryService->getCategoryBySlug($slug);
        $posts = $this->postService->getPostsByCategoryId($category->id, true, 8);

        SEOHelper::setSEO(
            $category->name,
            $category->description,
            route('category.show', ['locale' => $locale, 'category' => $category->slug]),
            $category->image ? asset('storage/' . $category->image) : null
        );

        return view('web.blog.category', compact('category', 'posts'));
    }
}