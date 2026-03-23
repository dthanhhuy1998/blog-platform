<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Helpers\SEOHelper;

class HomeController extends Controller
{
    public function index()
    {
        SEOHelper::setSEO(
            title: 'Home',
            description: 'Home description',
            url: route('index'),
            image: asset('images/seo/default-og.jpg'),
            type: 'website'
        );

        return view('web.pages.home');
    }
}