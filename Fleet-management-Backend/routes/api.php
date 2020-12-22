<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\API\BusController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\TripController;

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

Route::group([
    //User Routes
], function ($router) {

    /*LOGIN ROUTE*/
    Route::post('login', [AuthController::class, 'login']);

    /*SIGNUP ROUTE*/
    Route::post('signup', [AuthController::class, 'signup']);

    /*LOGOUT ROUTE*/
    Route::post('logout', [AuthController::class, 'logout']);

    /*REFRESHING THE TOKEN ROUTE*/
    Route::post('refresh', [AuthController::class, 'refresh']);

    /*LOGGED-IN USER ROUTE*/
    Route::post('me', [AuthController::class, 'me']);

});

/*STATIONS ROUTE*/
Route::get('/stations', [StationController::class, 'index']);

/*BUSES ROUTE*/
Route::get('/buses', [BusController::class, 'index']);

/*TRIPS ROUTE*/
Route::post('/trips/create', [TripController::class, 'create']);
