<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\UserController;



Route::controller(UserController::class)->group(function () {
    Route::post('login','Login')->name('login');
    Route::post('logout','Logout')->middleware('auth:sanctum')->name('logout');
    Route::post('register','Register')->name('register');
    //Email varifaction
    Route::post('reset/password/email','sendResetOtpEmail')->middleware('guest');
    Route::post('reset/password','resetPassword')->name('reset.password');


 });
