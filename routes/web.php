<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('login', [AuthController::class, 'showLoginForm'])->middleware('autoLogin')->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');