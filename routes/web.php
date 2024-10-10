<?php

use App\Http\Controllers\localcontroller;
use App\Http\Controllers\lspcontroller;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\paypalecontroller;
use App\Http\Controllers\sendsmscontroller;
use App\Http\Controllers\smscontroller;
use App\Http\Controllers\SocialiteController;
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
});

Route::get('chart',[Maincontroller::class,'chart']);

Route::get('auth/google',[SocialiteController::class,'redirectTogoogle']);
Route::get('auth/google/callback',[SocialiteController::class,'handleGoogleCallback']);


Route::get('payment',[paypalecontroller::class,'payment'])->name('payment');
Route::get('cancel',[paypalecontroller::class,'cancel'])->name('payment.cancel');
Route::get('payment/success',[paypalecontroller::class,'success'])->name('payment.success');

Route::get('send',[sendsmscontroller::class,'send']);


Route::get('lang/{lang}',[localcontroller::class,'change']);

Route::get('send',[smscontroller::class,'send']);


Route::get('pdf',[lspcontroller::class,'pdf']);