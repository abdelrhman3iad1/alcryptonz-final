<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CryptoConverterController;
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



Route::prefix("/dashboard")->group(function(){
    Route::get("categories",function(){
        return view("Dashboard.Categories.index");
    });
    



    Route::resource("promotions",PromotionController::class);
});
Route::get('/converter', [CryptoConverterController::class, 'index'])->name('converter');
Route::post('/convert', [CryptoConverterController::class, 'convert'])->name('convert');
