<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Modules\Blog\Controllers\Web\PostController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('{locale}/{category}/{slug}-{id}', [PostController::class, 'show'])
    ->where(['slug' => '[a-z0-9\-]+', 'id' => '[0-9]+'])
    ->name('post.show');

Route::get('login', [AuthController::class, 'showLoginForm'])->middleware('autoLogin')->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');