<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Modules\Blog\Controllers\Admin\PostCategoryController;
use App\Modules\Blog\Controllers\Admin\PostController;
use App\Modules\User\Controllers\Admin\UserController;
use App\Modules\Banner\Controllers\Admin\BannerController;
use App\Modules\User\Controllers\Admin\SettingController;

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('users/reset-password', [UserController::class, 'reset'])->name('users.reset-password');
Route::resource('users', UserController::class);
Route::resource('categories', PostCategoryController::class);
Route::resource('posts', PostController::class);
Route::resource('banners', BannerController::class);
Route::resource('settings', SettingController::class);