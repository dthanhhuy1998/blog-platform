<?php 

namespace App\Modules\Blog\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Modules\Blog\Services\PostService;
use App\Helpers\SEOHelper;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService
    ) {}

    public function show($locale, $category, $slug, $id)
    {
        $post = $this->postService->getPostById($id);

        if (!$post) abort(404);

        $expectedSlug = Str::slug($post->title);

        SEOHelper::setSEO(
            $post->title,
            $post->description,
            generate_url($post),
            $post->image ? asset('storage/' . $post->image) : null
        );

        if ($slug !== $expectedSlug) {
            return redirect()->route('web.blog.blog-detail', [
                'locale' => $locale,
                'category' => $category,
                'slug' => $expectedSlug,
                'id' => $post->id
            ], 301);
        }

        return view('web.blog.blog-detail', compact('post'));
    }
}