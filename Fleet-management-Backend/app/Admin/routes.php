<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    /*BUSES ROUTE FOR ADMIN*/
    $router->resource('buses', BusController::class);

    /*TRIPS ROUTE FOR ADMIN*/
    $router->resource('trips', TripController::class);

    /*STATIONS ROUTE FOR ADMIN*/
    $router->resource('stations', StationController::class);

});
