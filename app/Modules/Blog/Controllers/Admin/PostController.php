<?php 

namespace App\Modules\Blog\Controllers\Admin;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }
}