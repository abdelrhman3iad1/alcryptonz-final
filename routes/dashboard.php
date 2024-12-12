<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\QaController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix("/dashboard")->middleware(AdminMiddleware::class)->group(function(){
    Route::get("categories",function(){
        return view("Dashboard.Categories.index");
    });
    

    Route::resource("questions",QaController::class);});
