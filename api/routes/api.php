<?php

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');


Route::group(['middleware' => ['auth:api']], function() {
    // User
    Route::post('/user', 'UserController@show');
    Route::get('/user/gradients', 'UserController@gradients');
    Route::get('/user/votes', 'UserController@votes');

    // Gradients
    Route::get('/gradients', 'GradientController@index');
    Route::post('/gradients', 'GradientController@store');
    Route::get('/gradients/{gradient}', 'GradientController@show');
    Route::post('/gradients/{gradient}/vote', 'VoteController@store');
    Route::delete('/gradients/{gradient}', 'GradientController@destroy');

    // Votes
    Route::get('votes', 'VoteController@index');
    Route::get('votes/{vote}', 'VoteController@show');
});



