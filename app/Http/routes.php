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

Route::get('/', [
    'as' => 'home',
    'uses' => 'ArticlesController@index'
]);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@contact']);
Route::post('contact', 'PagesController@sendContact');
Route::get('about', 'PagesController@about');

Route::get('admin', [
    'as' => 'admin.index',
    'uses' => 'AdminController@index'
]);
Route::get('admin/comments', [
    'as' => 'admin.comments',
    'uses' => 'AdminController@comments'
]);
Route::get('admin/comments/{id}', [
    'as' => 'admin.approve',
    'uses' => 'AdminController@approveComment'
]);


Route::get('articles', [
    'as' => 'articles.index',
    'uses' => 'ArticlesController@index'
]);
Route::get('articles/create', [
    'as' => 'articles.create',
    'uses' => 'ArticlesController@create'
]);
Route::post('articles', [
    'as' => 'articles.store',
    'uses' => 'ArticlesController@store'
]);
Route::get('articles/{articles}', [
    'as' => 'articles.show',
    'uses' => 'ArticlesController@show'
]);
Route::get('articles/{articles}/edit', [
    'as' => 'articles.edit',
    'uses' => 'ArticlesController@edit'
]);
Route::put('articles/{articles}', [
    'as' => 'articles.update',
    'uses' => 'ArticlesController@update'
]);
Route::patch('articles/{articles}', 'ArticlesController@update');


Route::post('comments', [
    'as' => 'comments.store',
    'uses' => 'CommentsController@store'
]);


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