<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BabiesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\BabyRequestsController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\SocialShareController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Example Routes


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("baby/{id}/{firstName}", [BabyRequestsController::class, "show"])->name("baby.show");
Route::get("nursery", [BabyRequestsController::class, "index"])->name("baby.index");

Route::get("about-us", function () {
    return view("about");
})->name("about-us");

Route::middleware(["auth", "role:user"])->name("user.")->group(function () {

    Route::get("profile", [UserProfileController::class, "index"])->name("profile");
    Route::put("profile", [UserProfileController::class, "update"])->name("profile.update");
});

Route::middleware("auth")->name("user.")->group(function () {
    Route::resource("baby-requests", BabyRequestsController::class);
});


Route::middleware(["auth", "role:admin"])->prefix("admin")->name("admin.")->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get("profile", [AdminProfileController::class, "index"])->name("profile");
    Route::put("profile", [AdminProfileController::class, "update"])->name("profile.update");
    Route::put("profile/password", [AdminProfileController::class, "updatePassword"])->name("profile.update-password");

    Route::resource('users', UsersController::class);

    Route::resource('babies', BabiesController::class);


});


Route::get('/share-social', [SocialShareController::class, 'index']);
// Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
