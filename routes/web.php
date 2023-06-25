<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\Registrcontroller;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','is_admin'])->group(function() { 
Route::get('' , [AdminController::class , "index"])->name('index');    
});

Route::prefix('Auth')->name('Auth.')->group(function() { 
    
    Route::get('login',  [LoginController::class ,'index'])->name('login');
    Route::post('validate_login', [LoginController::class ,'validate_login'])->name('validate_login');

    Route::get('registration', [Registrcontroller::class ,'registration'])->name('registration');
    Route::post('registration', [Registrcontroller::class ,'validate_registration'])->name('validateRegistration');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    });
    // Auth::routes(['verify' => true]);
