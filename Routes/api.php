<?php

use Illuminate\Http\Request;

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
//'auth:api'

Route::middleware([])->group(function () {

    Route::controller(\Modules\LBCore\Http\Controllers\AuthController::class)->group(function () {
        Route::post('/login', 'login');
    });

});


