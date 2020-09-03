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
Route::get('/quarter',[
    'uses'=>'ApiController@getQuarters'
]);
Route::get('/street',[
    'uses'=>'ApiController@getStreets'
]);
Route::get('/driver',[
    'uses'=>'ApiController@getDrivers'
]);
Route::post('/quarter/new',[
    'uses'=>'ApiController@postNewQuarter'
]);
Route::get('/image/{img_name}',[
    'uses'=>'ApiController@getImage'
]);
