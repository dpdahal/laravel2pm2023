<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Auth\AdminLoginController;
use App\Http\Controllers\Backend\Admin\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return "Normal Login";
})->name('login');

Route::get('logout', function () {
    return "Normal logout";
})->name('logout');


Route::group(['namespace' => 'Backend'], function () {
    Route::get('admin-login', [AdminLoginController::class, 'index'])->name('admin-login');
    Route::post('admin-login', [AdminLoginController::class, 'login']);

});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('admin', '\App\Http\Controllers\Backend\Admin\AdminController');
    Route::any('admin-change-password', [AdminController::class, 'changePassword'])->name('admin-change-password');
    Route::any('admin-logout', [AdminLoginController::class, 'logout'])->name('admin-logout');

});
