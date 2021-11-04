<?php

use Illuminate\Support\Facades\Route;
//Auth::LoginUsingId(61);
/*
|--------------------------------------------------------------------------
| WebSite Routes
|--------------------------------------------------------------------------
|
| Here is where you can register website routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//vistiors(auth()->id());

Route::group(['middleware' => ['web' , 'HtmlMinifier']], function () {

   Route::get('/'       , 'IntroController@index');
   Route::post('/send-message'       , 'IntroController@sendMessage');
   Route::get('/lang/{lang}'       , 'IntroController@SetLanguage');
    // guest routes
    Route::group(['middleware' => ['guest']], function () {
      
    });
    // guest routes

    // auth  routes
    Route::group(['middleware' => ['auth']], function () {

    });
    // auth  routes

});








