<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware('auth','aa')->group(function() { 
Route::get('' , [AdminController::class , "index"])->name('index');    
});

Route::prefix('api')->name('api.')->group(function() { 
    // Route::get('login' , [LoginController::class , "login"])->name('login');
    // Route::post('login_data' , [LoginController::class , "log   in_data"])->name('login_data');
    Route::get('login',  [LoginController::class ,'index'])->name('login');
    Route::post('validate_login', [LoginController::class ,'validate_login'])->name('validate_login');

    Route::get('registration', [LoginController::class ,'registration'])->name('registration');
    Route::post('registration', [LoginController::class ,'validate_registration'])->name('validateRegistration');


   

    });
    
