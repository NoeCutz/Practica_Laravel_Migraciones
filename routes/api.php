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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para manejar las solicitudes a vendedores
Route::get('sellers','SellersController@index');
Route::get('sellers/{id}','SellersController@show');
Route::post('sellers','SellersController@store');
Route::put('sellers/{id}','SellersController@update');
Route::patch('sellers/{id}','SellersController@update');
Route::delete('sellers/{id}','SellersController@destroy');
