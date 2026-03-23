<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\SEOHelper;
use App\Modules\Blog\Services\PostService;

class HomeController extends Controller
{
    public function __construct(private PostService $postService) {}

    public function index()
    {
        $latestPost = $this->postService->getLatestPost();
        $orderLatestPosts = $this->postService->getLatestPosts(4, [$latestPost->id ?? 0]);

        $posts = $this->postService->getAllPost();

        SEOHelper::setSEO(
            title: 'Home',
            description: 'Home description',
            url: route('index'),
            image: asset('images/seo/default-og.jpg'),
            type: 'website'
        );

        return view('web.pages.home', compact('latestPost', 'orderLatestPosts', 'posts'));
    }
}