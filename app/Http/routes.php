<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


# Show Cache
Route::get('/all', array('as' => 'all', 'uses' => 'BookController@all'));

# Flush Cache
Route::get('/flush', array('as' => 'searchBook', 'uses' => 'BookController@flush'));

# Add Book API
Route::post('/addBook', array('as' => 'addbook', 'uses' => 'BookController@addBook'));


# Get Most Sold Books API
Route::get('/getSoldBooks', array('as' => 'getSoldBooks', 'uses' => 'BookController@getSoldBooks'));

# Search Book API
Route::get('/search', array('as' => 'searchBook', 'uses' => 'BookController@search'));



