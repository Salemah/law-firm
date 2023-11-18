<?php

use App\Http\Controllers\Casecontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Companycontroller;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalAreacontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
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
Route::resource('/', HomeController::class);
Route::get('e', [HomeController::class, 'index2']);
Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    Route::get('post/{id}', [HomeController::class, 'postShow'])->name('post.show');
    Route::get('all-post', [HomeController::class, 'allPost'])->name('all.post');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('cases', [HomeController::class, 'cases'])->name('cases');
    Route::get('cases-details/{id?}', [HomeController::class, 'casesDetails'])->name('cases.details');
});
// Category
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('category', CategoryController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('status/update/{id}', [CategoryController::class, 'statusUpdate'])->name('update.status');
    });

    //dashboard seting
    Route::resource('dashboard-setting', DashboardSettingController::class)->middleware(['auth', 'verified']);
    //post route
    Route::resource('post', PostController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('status/update/{id}', [PostController::class, 'statusUpdate'])->name('update.status');
    });
    //slider route
    Route::resource('slider', SliderController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('status/update/{id}', [SliderController::class, 'statusUpdate'])->name('update.status');
    });
    //TEAM
    Route::resource('team', TeamController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
        Route::get('status/update/{id}', [TeamController::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('case', Casecontroller::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'case', 'as' => 'case.'], function () {
        Route::get('status/update/{id}', [Casecontroller::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('legalarea', LegalAreacontroller::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'leagal-area', 'as' => 'leagal-area.'], function () {
        Route::get('status/update/{id}', [LegalAreacontroller::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('company', Companycontroller::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
        Route::get('status/update/{id}', [Companycontroller::class, 'statusUpdate'])->name('update.status');
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

require __DIR__ . '/auth.php';
