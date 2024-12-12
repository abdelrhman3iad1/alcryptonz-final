<?php
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeamController;
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
    Route::resource("partners",PartnerController::class);
    Route::resource("departments",DepartmentController::class);
    Route::resource("teams",TeamController::class);
});

    

