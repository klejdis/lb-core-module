<?php

use Illuminate\Http\Request;
use Modules\LBCore\Http\Controllers\AuthController;
use Modules\LBCore\Http\Controllers\UsersController;

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

Route::name('api.')->group(function () {

    //Public Routes
    Route::middleware([])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('/login', 'login');
        });
    });

    //Routes protected from sanctum
    //'auth:sanctum'
    Route::middleware([])->group(function () {

        Route::controller(AuthController::class)->group(function () {
            Route::post('/register', 'register');
        });

        Route::name('users.')->group(function () {
            Route::controller(UsersController::class)->group(function () {
                Route::get('/users', 'index')->name('index');
                Route::post('/users/store', 'store');
                Route::get('/users/{user}/show', 'show');
                Route::delete('/users/{user}/destroy', 'destroy')->name('destroy');
            });
        });


    });

});



