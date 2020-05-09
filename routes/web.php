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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'TopController@index');

Route::get('twitterresetter', 'TwitterController@index');
Route::post('twitterresetter/authenticate', 'TwitterController@authenticate');
Route::get('twitterresetter/callback', 'TwitterController@callback');
Route::post('twitterresetter/reset', 'TwitterController@reset');
