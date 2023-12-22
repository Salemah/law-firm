<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\Casecontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Companycontroller;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalAreacontroller;
use App\Http\Controllers\MakeUsUniqueController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SubLegalAreaController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\WelcomeSectionController;
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
    Route::get('about-us', [HomeController::class, 'aboutus'])->name('aboutus');
    Route::get('our-team', [HomeController::class, 'ourteam'])->name('ourteam');
    Route::get('our-service', [HomeController::class, 'ourservice'])->name('ourservice');
    Route::get('our-service-sub/{id?}', [HomeController::class, 'ourservicesub'])->name('ourservice.sub');
    Route::get('our-team-area-wise/{id?}', [HomeController::class, 'ourteamAreaWise'])->name('ourteam.area.wise');

    Route::post('contact-message/{id?}', [HomeController::class, 'ContactMessageInsert'])->name('contact.message');
    Route::get('slot-data/{id?}/{aptDate?}', [HomeController::class, 'SlotData'])->name('slot.data');
    Route::get('slot/data/get', [HomeController::class, 'SlotDataGet'])->name('appointment.check');

});
Route::post('signin-process', [HomeController::class, 'SignInProcess'])->name('sign-in.process');
Route::post('signUp-process', [HomeController::class, 'SignUpProcess'])->name('sign-Up.process');
Route::post('appointment/save', [AppoinmentController::class, 'AppointmentSave'])->name('appointment.save');
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
    Route::post('sub-legal-area-search',[ TeamController::class,'SubLegalAreaSearch'])->name('team.sublegalarea');
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


    Route::resource('slot', SlotController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'slot', 'as' => 'slot.'], function () {
        Route::get('status/update/{id}', [SlotController::class, 'statusUpdate'])->name('update.status');
    });


    Route::resource('company', Companycontroller::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
        Route::get('status/update/{id}', [Companycontroller::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('question', QuestionController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'question', 'as' => 'question.'], function () {
        Route::get('status/update/{id}', [QuestionController::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('aboutus', AboutUsController::class)->middleware(['auth', 'verified']);
    Route::resource('makeusunique', MakeUsUniqueController::class)->middleware(['auth', 'verified']);
    Route::resource('welcomesection', WelcomeSectionController::class)->middleware(['auth', 'verified']);
    Route::resource('client', ClientController::class)->middleware(['auth', 'verified']);
    Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
        Route::get('status/update/{id}', [ClientController::class, 'statusUpdate'])->name('update.status');
    });
    Route::resource('sublegalarea', SubLegalAreaController::class)->middleware(['auth', 'verified']);

    //permission

    Route::post('user_management/update', [UserManagementController::class, 'UserManagementAddUpdate'])->name('user_management.update');
    Route::get('user_management/delete/{id}', [UserManagementController::class, 'UserMaagementDelete'])->name('user_management.delete');
    Route::get('user_management', [UserManagementController::class, 'user_management'])->name('user_management');
    Route::get('user_management_edit', [UserManagementController::class, 'UserEditData'])->name('user_management.edit');
    Route::get('user_restiction/edit/{id?}', [UserManagementController::class, 'UserRectictions'])->name('user_restictions.edit');
    Route::post('user_restiction/update', [UserManagementController::class, 'UserRectictionsUpdate'])->name('user_restictions.update');
    Route::get('user_management/data', [UserManagementController::class, 'UserDataList'])->name('user_management.data');

    Route::get('user_role_list', [UserManagementController::class, 'userRoleLists'])->name('user_role_list');
    Route::get('user_role/{id?}', [UserManagementController::class, 'userRole'])->name('user-role');
    Route::post('user_role/update', [UserManagementController::class, 'userRoleUpdate'])->name('user_role.update');

});
// Route::get('send-mail', [MailController::class, 'index']);
Route::get('/dashboard', function () {
    return view('admin.dashboard.master');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('user/dashboard', function () {
//     return view('admin.dashboard.master');
// })->middleware(['auth', 'verified'])->name('user.dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'UserDashboard'])->name('user.dashboard');
    Route::get('view-shedule/{id?}', [HomeController::class, 'ViewShedule'])->name('home.view.shedule');
    Route::get('my/appointment/{id?}', [UserController::class, 'myAppointment'])->name('my.appointment');
    Route::get('my/appointment/data', [AppoinmentController::class, 'myAppointmentData'])->name('my.appointment.data');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/profile', [UserController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/user/update', [UserController::class, 'UserUpdate'])->name('update');
    });
});
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit/user/{id?}', [ProfileController::class, 'editUser'])->name('profile.edit.user');
    // Route::post('/profile/user/update', [ProfileController::class, 'UserUpdate'])->name('user.update');
});
Route::group(['middleware' => ['role:admin|superadmin']], function () {

});
require __DIR__ . '/auth.php';
