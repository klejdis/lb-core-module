<?php

use Illuminate\Http\Request;
use Modules\LBCore\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware([])->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
    });

});

Route::middleware(['auth:sanctum'])->group(function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register');
    });

});


