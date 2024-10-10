<?php

use App\Http\Controllers\api\apiscontroller;
use App\Http\Controllers\api\Emailcontroller as ApiEmailcontroller;
use App\Http\Controllers\api\Productcontroller;
use App\Http\Controllers\api\Registercontroller;
use App\Http\Controllers\Emailcontroller;
use App\Http\Controllers\lspcontroller;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\smscontroller;
use App\Http\Controllers\SocialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(Registercontroller::class)->group(function(){
    Route::post('register','register');
    Route::post('login','login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/export',[Productcontroller::class,'export']);
// Route::get('/import',[Productcontroller::class,'import']);


Route::resource('/products',Productcontroller::class)->middleware(['auth:sanctum']);

Route::get('sendemail',[ApiEmailcontroller::class,'send'])->middleware('auth:sanctum');
Route::get('index',[apiscontroller::class,'index']);


Route::get('auth/google',[SocialiteController::class,'redirectTogoogle'])->middleware('auth:sanctum');
Route::get('auth/google/callback',[SocialiteController::class,'handleGoogleCallback'])->middleware('auth:sanctum');


Route::get('send',[smscontroller::class,'send']);
Route::get('sms',[lspcontroller::class,'sms']);