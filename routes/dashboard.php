<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QaController;
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
    Route::resource("promotions",PromotionController::class);
    Route::resource("questions",QaController::class);
});

    

    
