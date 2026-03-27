<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Modules\Blog\Controllers\Web\PostController;
use App\Modules\Blog\Controllers\Web\PostCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('{locale}')->group(function () {
    Route::get('blog', [PostController::class, 'index'])->name('post.index');
    
    Route::get('{category}', [PostCategoryController::class, 'show'])->name('category.show');
    
    Route::get('{category}/{slug}-{id}', [PostController::class, 'show'])
        ->where([
            'slug' => '[a-z0-9\-]+',
            'id' => '[0-9]+',
        ])
        ->name('post.show');

    
    Route::get('{category}/search', [PostController::class, 'search'])->name('post.search');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->middleware('autoLogin')->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');