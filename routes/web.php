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


Route::get('/{language}',[LanguageController::class,"Language"]);

Route::middleware('locale')->group(function(){
    
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('register', function () {
    return view('auth.register');
});

Route::post('register', [UserAuthController::class, 'register'])->name('register');
Route::get('/search', [PostController::class, 'search'])->name('search');

Route::get('login', function () {
    return view('auth.login');
});


Route::post('login', [UserAuthController::class, 'login'])->name('login');


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





});


require __DIR__. "/dashboard.php";
