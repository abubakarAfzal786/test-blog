<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});



Route::group([

	'middleware' => 'api',
	'prefix' => 'auth'

], function ($router) {
	Route::post('signup', 'AuthController@SignUp');

	Route::post('login', 'AuthController@login');
	Route::post('logout', 'AuthController@logout');
	Route::post('refresh', 'AuthController@refresh');
	Route::post('me', 'AuthController@me');
});
Route::apiResource('posts', 'PostsController');
Route::apiResource('post/{question}/reply', 'ReplyController');
Route::get('comment/{id}', 'ReplyController@reply');
Route::apiResource('friends', 'FriendController');
// Route::apiResource('Chat','ChatController');
Route::post('chat', 'ChatController@get_chat');
Route::post('send_chat', 'ChatController@send_chat');
