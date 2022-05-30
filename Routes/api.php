<?php

use Illuminate\Http\Request;
use Modules\LBCore\Http\Controllers\AuthController;
use Modules\LBCore\Http\Controllers\PermissionsController;
use Modules\LBCore\Http\Controllers\RolesController;
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
                Route::post('/users', 'index')->name('index');
                Route::post('/users/store', 'store');
                Route::get('/users/{user}/show', 'show');
                Route::patch('/users/{user}/update', 'update');
                Route::delete('/users/{user}/destroy', 'destroy')->name('destroy');
            });
        });

        Route::name('roles.')->group(function () {
            Route::controller(RolesController::class)->group(function () {
                Route::post('/roles', 'index')->name('index');
                Route::post('/roles/paginated', 'roles')->name('paginated');
                Route::post('/roles/store', 'store');
                Route::get('/roles/{role}/show', 'show');
                Route::patch('/roles/{role}/update', 'update');
                Route::delete('/roles/{role}/destroy', 'destroy')->name('destroy');
            });
        });

        Route::name('permissions.')->group(function () {
            Route::controller(PermissionsController::class)->group(function () {
                Route::get('/permissions', 'index')->name('index');
            });
        });


    });

});



