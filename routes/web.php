<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
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

// Route::get('/', function () {
//     //return view('admin.dashboard.master');
//      return view('frontend.home');
// });
Route::resource('/',HomeController::class);
Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    Route::get('post/{id}',[HomeController::class,'postShow'])->name('post.show');
    Route::get('all-post',[HomeController::class,'allPost'])->name('all.post');
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
    //slider route
    Route::resource('slider',SliderController::class);
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('status/update/{id}',[SliderController::class,'statusUpdate'])->name('update.status');
    });

});
