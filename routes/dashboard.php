<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CryptoConverterController;
use App\Http\Controllers\HomeController;
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

// middleware(AdminMiddleware::class)->
//middleware("admin")->
Route::prefix("/dashboard")->group(function(){    
    Route::resource("promotions",PromotionController::class);
    Route::resource("questions",QaController::class);
    Route::resource("partners",PartnerController::class);
    Route::resource("departments",DepartmentController::class);
    Route::resource("teams",TeamController::class);
    Route::resource("categories",CategoryController::class);
    Route::resource("posts",PostController::class);
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('/posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');
});

    



Route::get('/converter', [CryptoConverterController::class, 'index'])->name('converter');
Route::post('/convert', [CryptoConverterController::class, 'convert'])->name('convert');