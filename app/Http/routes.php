<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'key'], function(){
    Route::get('ballot', 'ElectionController@ballot');
    Route::post('ballot', 'ElectionController@processBallot');
});


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@home');

    Route::get('/count', 'ElectionController@countVote');

    Route::get('/send', 'ElectionController@sendAllBallot');

    Route::resource('voter', 'VoterController', ['except' => ['edit', 'update']]);

    Route::resource('candidate', 'CandidateController', ['except' => ['edit', 'update']]);

    Route::post('voter/{id}/resend', 'ElectionController@resendBallot');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');