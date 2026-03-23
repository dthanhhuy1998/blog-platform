<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Modules\Blog\Services\PostService;

class DashboardController extends Controller
{
    public function __construct(private PostService $postService) {}

    public function index() 
    {
        $titlePage = __('Dashboard');

        $postTotal = $this->postService->getPostTotal(1); // Active

        return view('admin.dashboard', compact(
            'titlePage',
            'postTotal'
        ));
    }
}
