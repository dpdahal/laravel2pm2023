<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\Ckeditor\CkeditorController;


Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('news/{criteria?}', [ApplicationController::class, 'news'])->name('news');
Route::post('search', [ApplicationController::class, 'search'])->name('search');

Route::get('login', [ApplicationController::class, 'login'])->name('login');

Route::get('logout', [ApplicationController::class, 'logout'])->name('logout');


Route::group(['namespace' => 'Backend'], function () {
    Route::get('admin-login', [AdminLoginController::class, 'index'])->name('admin-login');
    Route::post('admin-login', [AdminLoginController::class, 'login']);

});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('admin', '\App\Http\Controllers\Backend\Admin\AdminController');
    Route::any('admin-change-password', [AdminController::class, 'changePassword'])->name('admin-change-password');
    Route::any('admin-logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

    Route::resource('admin-category', '\App\Http\Controllers\Backend\News\CategoryController');
    Route::resource('admin-news', '\App\Http\Controllers\Backend\News\NewsController');
    Route::post('ckeditor-image-upload', [CkeditorController::class, 'index'])->name('ckeditor-image-upload');

});
