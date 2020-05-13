<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//
//    return view('welcome');
//
//});
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 認証画面
Route::group(['prefix' => 'auth','middleware' => 'auth.basic'], function() {

    Route::get('/test', 'TestController@view');

}); //})->middleware('auth.basic');
