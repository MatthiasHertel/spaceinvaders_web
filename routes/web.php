<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@getIndex');
Route::get('/highscore', 'PagesController@getHighscore')->name('highscore');
Route::get('/dokumentation', 'PagesController@getDokumentation')->name('dokumentation');
Route::get('/download', 'PagesController@getDownload')->name('download');


Route::get('/intern', 'InternController@getIntern')->name('intern');
Route::get('/admin', 'InternController@getAdmin')->name('admin');

Auth::routes();
Route::get('register/verify/{token}','Auth\RegisterController@verify');
