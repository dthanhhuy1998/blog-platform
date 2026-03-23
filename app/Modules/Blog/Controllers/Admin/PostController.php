<?php 

namespace App\Modules\Blog\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Str;

use App\Modules\Blog\Services\PostService;
use App\Modules\Blog\Services\PostCategoryService;
use App\Helpers\SEOHelper;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
        private PostCategoryService $categoryService
    ) {}

    public function index()
    {
        $posts = $this->postService->getAllPost();

        SEOHelper::setSEO(__('Post List') . ' | ' . page_name());
        $pageTitle = __('Post List');

        return view('admin.blog.index', compact('pageTitle', 'posts'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategory();

        SEOHelper::setSEO(__('Create Post') . ' | ' . page_name());
        $pageTitle = __('Create Post');

        return view('admin.blog.create', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255|unique:article,title',
            'metaTitle'     => 'required|max:100',
            'categories'    => 'required|array',
            'categories.*'  => 'required|integer',
        ],[
            'title.required'        => 'Title is required!',
            'title.max'             => 'Title max 255 characters!',
            'title.unique'          => 'Title already exists!',
            'metaTitle.required'    => 'Meta Title is required!',
            'metaTitle.max'         => 'Meta Title max 100 characters!',
            'categories.required'   => 'Please select categories!',
        ]);

        $filePath = '';
        if($request->hasFile('file')) {
            $filePath = Storage::disk('public')->putFile('posts/thumbnails', $request->file('file'));
        }

        $data = [
            'image'             => $filePath,
            'title'             => $request->get('title'),
            'slug'              => Str::slug($request->get('title')),
            'summary'           => $request->get('summary'),
            'content'           => $request->get('content'),
            'meta_title'        => $request->get('metaTitle'),
            'meta_description'  => $request->get('metaDescription'),
            'meta_keyword'      => $request->get('metaTagKeywords'),
            'sort_order'        => $request->get('sortOrder'),
            'status'            => $request->get('status'),
        ];

        $post = $this->postService->store($data);
        $post->categories()->attach($request->get('categories'));

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    public function edit(string $postId)
    {
        $post = $this->postService->getPostById($postId);
        $categories = $this->categoryService->getAllCategory();

        $selectedCategories = $post->categories->pluck('id')->toArray();

        $title = __('Edit') . ': ' . $post->title;

        SEOHelper::setSEO($title . ' | ' . page_name());
        $pageTitle = $title;

        return view('admin.blog.edit', compact('pageTitle', 'categories', 'post', 'selectedCategories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255|unique:article,title,' . $id,
            'metaTitle'     => 'required|max:100',
            'categories'    => 'required',
        ],[
            'title.required'        => 'Title is required!',
            'title.max'             => 'Title max 255 characters!',
            'title.unique'          => 'Title already exists!',
            'metaTitle.required'    => 'Meta Title is required!',
            'metaTitle.max'         => 'Meta Title max 100 characters!',
            'categories.required'   => 'Please select categories!',
        ]);

        $post = $this->postService->getPostById($id);
        
        $filePath = $post->image;
        if($request->hasFile('file')) {
            $filePath = Storage::disk('public')->putFile('posts/thumbnails', $request->file('file'));
        }

        $data = [
            'image'             => $filePath,
            'title'             => $request->get('title'),
            'slug'              => Str::slug($request->get('title')),
            'summary'           => $request->get('summary'),
            'content'           => $request->get('content'),
            'meta_title'        => $request->get('metaTitle'),
            'meta_description'  => $request->get('metaDescription'),
            'meta_keyword'      => $request->get('metaTagKeywords'),
            'sort_order'        => $request->get('sortOrder'),
            'status'            => $request->get('status'),
        ];

        $this->postService->update($id, $data);
        $post->categories()->sync($request->get('categories'));

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = $this->postService->getPostById($id);

        if($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $this->postService->destroy($id);

        return redirect()->route('admin.posts.index')->with('success_msg', 'Post deleted successfully');
    }
}