<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    

    Route::resource("promotions",PromotionController::class);
    Route::resource("categories",CategoryController::class);
    Route::resource("posts",PostController::class);

    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');
});
