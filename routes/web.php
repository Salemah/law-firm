<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
//     return view('welcome');
// });
Route::resource('/',HomeController::class);
Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    Route::get('post/{id}',[HomeController::class,'postShow'])->middleware(['auth', 'verified'])->name('post.show');
    Route::get('all-post',[HomeController::class,'allPost'])->middleware(['auth', 'verified'])->name('all.post');
});
// Category
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('category',CategoryController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('status/update/{id}',[CategoryController::class,'statusUpdate'])->name('update.status');
    });

    //dashboard seting
    Route::resource('dashboard-setting',DashboardSettingController::class)->middleware(['auth', 'verified']);
    //post route
    Route::resource('post',PostController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('status/update/{id}',[PostController::class,'statusUpdate'])->name('update.status');
    });
    //slider route
    Route::resource('slider',SliderController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('status/update/{id}',[SliderController::class,'statusUpdate'])->name('update.status');
    });

});
Route::get('/dashboard', function () {
    return view('admin.dashboard.master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
