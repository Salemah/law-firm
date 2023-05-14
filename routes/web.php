<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard.master');
    // return view('frontend.home');
});

// Category
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('category',CategoryController::class);
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('status/update/{id}',[CategoryController::class,'statusUpdate'])->name('update.status');
    });

    //dashboard seting
    Route::resource('dashboard-setting',DashboardSettingController::class);
    //post route
    Route::resource('post',PostController::class);
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('status/update/{id}',[PostController::class,'statusUpdate'])->name('update.status');
    });
});
