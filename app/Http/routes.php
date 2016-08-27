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

Route::get('/', ['middleware' => 'authorization', function() {
    return view('pages.home');
}]);

Route::get('/tickets', ['middleware' => 'authorization', function() {
    return view('pages.tickets');
}]);

Route::get('/betakeys', ['middleware' => 'authorization', function() {
    return view('pages.betakeys');
}]);



Route::get('/news', ['middleware' => 'authorization', 'uses' => 'NewsController@getNewsPage']);
Route::get('/ticket/{id}', ['middleware' => 'authorization', 'uses' => 'TicketController@ticket']);

Route::post('/editnews', ['middleware' => 'authorization', 'uses' => 'NewsController@editnews']);
Route::post('/news/{id}', ['middleware' => 'authorization', 'uses' => 'NewsController@update']);
Route::post('/news', ['middleware' => 'authorization', 'uses' => 'NewsController@create']);
Route::post('/searchuser', ['middleware' => 'authorization', 'uses' => 'AccountController@search']);
Route::post('/replyticket/{id}', ['middleware' => 'authorization', 'uses' => 'TicketController@reply']);
Route::post('/closeticket/{id}', ['middleware' => 'authorization', 'uses' => 'TicketController@close']);
Route::post('/betakeyaccept/{email}', ['middleware' => 'authorization', 'uses' => 'BetaController@accept']);
