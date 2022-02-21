<?php


use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::post('/send/code',[App\Http\Controllers\Auth\LoginController::class,'sendotp'])->name('send.otp');
Route::post('/verify/code/', [App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('verify.code');
