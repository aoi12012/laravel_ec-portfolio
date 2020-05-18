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

Route::group(['middleware'], function() {
  Route::post('/login', 'AuthenticateController@login');

  Route::apiResource('/items', 'ItemController');
  Route::get('/search/{search}', 'SearchController@productSearch');
});
Route::group(['middleware' => 'auth:api'], function() {
  Route::apiResource('/test/items', 'ItemController');
  Route::get('/logout', 'AuthenticateController@logout');
});


Route::apiResource('/admin/items', 'admin\ItemsController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
