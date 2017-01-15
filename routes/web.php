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

Route::get('/', [
        'uses' => 'PagesController@getIndex',
        'as' => 'index'
    ]);
Route::get('/highscore', [
        'uses' => 'PagesController@getHighscore',
        'as' => 'highscore'
    ]);
Route::get('/dokumentation', [
        'uses' => 'PagesController@getDokumentation',
        'as' => 'dokumentation'
    ]);
Route::get('/download', [
        'uses' => 'PagesController@getDownload',
        'as' => 'download'
    ]);

Route::group(['prefix' => 'intern'], function () {
  Route::get('/intern', [
          'uses' => 'InternController@getIntern',
          'as' => 'intern.intern'
      ]);
  Route::get('/admin', [
          'uses' => 'InternController@getAdmin',
          'as' => 'intern.admin',
          'middleware' => ['roles' ],
          'roles' => ['Admin']
      ]);
  Route::post('/admin/assign-roles', [
          'uses' => 'InternController@postAdminAssignRoles',
          'as' => 'intern.admin.assign',
          'middleware' => 'roles',
          'roles' => ['Admin']
      ]);
  Route::get('/monitoring', [
          'uses' => 'InternController@getMonitoring',
          'as' => 'intern.monitoring',
          'middleware' => ['roles' ],
          'roles' => ['Admin']
      ]);
  Route::get('/chat', [
          'uses' => 'InternController@getChat',
          'as' => 'intern.chat',
          'middleware' => ['roles' ],
          'roles' => ['Admin']
      ]);
});

Auth::routes();
Route::get('register/verify/{token}', [
        'uses' => 'Auth\RegisterController@verify',
        'as' => 'verify'
    ]);
