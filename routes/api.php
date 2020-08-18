<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/products', 'ProductController');
Route::post('/orders', 'OrderController@store');
Route::post('/login', 'AuthController@login');

Route::group(['middleware' => ['CheckClientCredentials','auth:api']], function() {
    Route::get('/orders', 'OrderController@get');
    Route::post('/logout', 'AuthController@logout');
});




