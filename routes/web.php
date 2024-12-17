<?php

use App\Http\Controllers\Auth\UserAuthController;
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



Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::get('register', function () {
    return view('auth.register');
})->name('register');
Route::post('register', [UserAuthController::class, 'register']);



Route::get('login', function () {
    return view('auth.login');
})
->name('login');

Route::post('login', [UserAuthController::class, 'login']);


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






require __DIR__. "/dashboard.php";
