<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// Models
use App\Models\Product;
use App\Models\Article;
use App\Models\User;

class IndexController extends Controller
{

    public function index() {
        $productTotal = Product::count();
        $articleTotal = Article::count();
        $userTotal = User::where('id', '<>', 1)
        ->count();

        $quoteToday = DB::table('quote')
        ->whereDay('created_at', date_format(date_create(date('Y-m-d H:i:s')), 'd'))
        ->count();

        $mostViewedPosts = Article::orderBy('view', 'desc')
        ->limit(10)
        ->get();

        $quoteMonths = DB::table('quote')
        ->whereMonth('created_at', date_format(date_create(date('Y-m-d H:i:s')), 'm'))
        ->get();

        $headingTitle = heading('Trang chính');
        $titlePage = 'Trang chính';

        return view('admin.pages.index',
            compact('headingTitle', 'titlePage', 'productTotal', 'articleTotal', 'quoteToday', 'userTotal', 'mostViewedPosts', 'quoteMonths')
        );
    }
}
