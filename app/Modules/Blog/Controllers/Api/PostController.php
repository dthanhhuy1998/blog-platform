<?php

namespace App\Modules\Blog\Controllers\Api;

use App\Modules\Blog\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Blog\Services\Api\PostApiService;

class PostController extends Controller
{
    public function __construct(
        protected PostApiService $postApiService
    ) {}

    public function getLatestPosts(Request $request)
    {
        $filters = $request->all();

        $posts = $this->postApiService->getLatestPosts($filters);

        return response()->json([
            'status' => 200,
            'data' => $posts
        ]);
    }
}