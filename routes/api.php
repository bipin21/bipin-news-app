<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('categories','Api\CategoryApiController@index');
Route::get('categories/{id}/posts','Api\CategoryApiController@posts');

Route::get('posts','Api\PostApiController@index');

Route::get('authors','Api\UserApiController@index');
Route::get('authors/{id}/posts','Api\UserApiController@posts');

Route::get('tags','Api\TagApiController@index');
Route::get('tags/{id}/posts','Api\UserApiController@posts');

Route::get('comments','Api\CommentApiController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
