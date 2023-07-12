<?php

use App\Http\Controllers\Api\AuthController;
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

Route::post('validate_login', [AuthController::class ,'validate_login']);
Route::post('registration', [AuthController::class ,'validate_registration']);

Route::middleware('auth:api')->group(function(){
    Route::get('get-user1', [AuthController::class ,'show']);
    
});

