<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'company-admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


});
