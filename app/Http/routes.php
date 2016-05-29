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

use Illuminate\Support\Facades\Auth;

// Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::resource('posts', 'PostsController');

Route::get('users', [
		'uses' => 'UsersController@index',
		'as'   => 'users.index'
]);
Route::get('users/profile', [
		'uses' => 'UsersController@profile',
		'as'   => 'users.profile'
]);
Route::get('users/{id}', [
		'uses' => 'UsersController@show',
		'as'   => 'users.show'
]);
Route::post('users/follow/{user_id}', [
		'uses' => 'UsersController@follow',
		'as'   => 'users.follow'
]);
Route::post('users/unfollow/{user_id}', [
		'uses' => 'UsersController@unfollow',
		'as'   => 'users.unfollow'
]);
Route::post('posts/{post_id}/comments', [
	'uses' => 'CommentsController@store',
	'as'   => 'comments.store'
]);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
