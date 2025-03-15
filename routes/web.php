<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PromotionController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [HomeController::class, "post"])->name('showPost');
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');    
Route::get('/qa', [HomeController::class, 'QA'])->name('qa.index');
Route::post('/qa/search', [HomeController::class, 'search'])->name('qa.search');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/AllPosts', [HomeController::class, 'AllPosts'])->name('AllPosts');
Route::get('/AllPartnersPosts', [HomeController::class, 'AllPartnersPosts'])->name('AllPartnersPosts');
Route::get('/crypto-news', [HomeController::class, 'cryptoNews'])->name('crypto-news');
Route::get('/categoriesRelated/{id}', [HomeController::class, 'categoriesRelated'])->name('categories.related');
Route::get("register", [UserAuthController::class, "create"]);
Route::post("register", [UserAuthController::class, "register"])->name("register");
Route::get("/about-us", function () {
    return view('Web.aboutus');
})->name("aboutUs");
Route::get("/privacy", [HomeController::class, 'privacy'])->name("privacy");

Route::get("login", [UserAuthController::class, "getLogin"])->name("get.login");
Route::post("login", [UserAuthController::class, "login"])->name("login");

Route::get("/{lang}", function ($lang) {
    if ($lang == "ar") {
        session()->put("lang", "ar");
    } else {
        session()->put("lang", "en");
    }
    return redirect()->back();
});

// web.php

// });

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    });

    Route::post('logout', [UserAuthController::class, 'logout'])->name('logout');


    Route::get('change-password', function () {
        return view('auth.change-password');
    })->name('change-password');

    Route::post('change-password', [UserAuthController::class, 'changePassword'])->name('change-password-function');
});
require __DIR__ . "/dashboard.php";
