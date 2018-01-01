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

Route::get('/', function () {
    return redirect()->action('App\StaticsController@index');
});
Route::get('/logout', ['uses' => 'App\StaticsController@logout']);

Route::group(['prefix' => 'app'], function() {
    Auth::routes();
    Route::get('/', ['as' => 'home', 'uses' => 'App\StaticsController@index']);
    Route::get('/post/show/{slug}', ['as' => 'post/show', 'uses' => 'App\StaticsController@showPost']);
    Route::get('/post/vote/{slug}', ['uses' => 'App\StaticsController@vote']);
    Route::get('/post/create', ['as' => 'post/create', 'uses' => 'App\StaticsController@showPostForm']);
    Route::post('/post/create', ['uses' => 'App\StaticsController@postPost']);
    Route::get('/categorie/{slug}', ['uses' => 'App\StaticsController@showPostByCategorie']);
    Route::get('/account/{name}', ['uses' => 'App\StaticsController@showAccount']);
    Route::get('/account/confirm', ['uses' => 'App\AuthController@confirmAccount']);
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['uses' => 'Admin\StaticsController@dashboard']);
    Route::get('/post/confirm/{slug}', ['uses' => 'Admin\StaticsController@confirmPost']);
});


Route::get('/home', 'HomeController@index')->name('home');
