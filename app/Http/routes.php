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

Route::get('/', 'ArticlesController@index');

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact', 'PagesController@sendContact');
Route::get('about', 'PagesController@about');

Route::resource('articles', 'ArticlesController');
Route::get('category/{title}', [ 'as' => 'category.index', 'uses' => 'ArticlesController@category' ]);
Route::get('tags/{tag}', [ 'as' => 'tag.index', 'uses' => 'ArticlesController@tags' ]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('feed', 'FeedController@feed');

Route::get('snowpoint', 'SnowpointController@index');
Route::get('snowpoint/contact', 'SnowpointController@contact');
Route::get('snowpoint/chat', 'SnowpointController@chat');