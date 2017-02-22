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
Route::get('sellers/{seller}','SellersController@show');
Route::post('sellers','SellersController@store');
Route::put('sellers/{seller}', 'SellersController@update');
Route::patch('sellers/{seller}','SellersController@update');
Route::delete('sellers/{seller}','SellersController@destroy');
Route::post('sellers/{seller}/address','SellersController@store_address');
Route::put('sellers/{seller}/address','SellersController@update_address');


//Rutas para manejar las solicitudes a productos
Route::get('products','ProductsController@index');
Route::get('products/{product}','ProductsController@show');
Route::post('products','ProductsController@store');
Route::put('products/{product}', 'ProductsController@update');
Route::patch('products/{product}','ProductsController@update_partial');
Route::delete('products/{product}','ProductsController@destroy');
Route::post('products/{product}/review','ProductsController@store_review');
Route::get('products/{product}/reviews','ProductsController@index_reviews');
Route::delete('products/{product}/{review}','ProductsController@destroy_review');
