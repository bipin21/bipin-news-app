<?php

use App\Category;
use App\Comment;
use App\Image;
use App\Post;
use App\User;
use App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Faker\Generator as Faker;
use phpDocumentor\Reflection\Types\Resource_;

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
Auth::routes(['verify'=>true]);

Route::get('/', 'BlogController@index');
Route::get('/blog/{slug}', 'BlogController@blogSingle');
Route::get('/category/{categoryName}/{id}', 'BlogController@categoryIndex');
Route::get('/tag/{tagName}/{id}', 'BlogController@tagIndex');
Route::get('blogs', 'BlogController@allBlogs');
Route::get('search', 'BlogController@search');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::post('/categories', 'CategoryController@store')->name('save-category');
    Route::get('/category/{id}', 'CategoryController@show');
    
    Route::get('/tags', 'TagController@index')->name('tags');
    Route::get('/tag/{id}', 'TagController@show');
    Route::post('/tags', 'TagController@store')->name('save-tag');
    
    Route::get('/comments', 'CommentController@index')->name('comments');
    Route::get('/comment/{id}', 'CommentController@show');

    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/post/{id}', 'PostController@show')->name('show-post');
    Route::get('/new-post', 'PostController@newPost')->name('new-post');
    Route::post('/new-post', 'PostController@store')->name('save-post');
    
    Route::get('/users', 'UserController@index')->name('users');
});



Route::get('/test', function () {
    $post = Category::paginate();
    return new \App\Http\Resources\CategoriesResource($post);
});
// Route::get('/post_tag', function () {
//     $faker = new Faker();
    
//     for($i=1;$i<1500;$i++){
//         DB::table('post_tag')->updateOrInsert(
//             [
//             'post_id'=>rand(1,1500),
//             'tag_id'=>rand(1,50)
//             ]
//         );
//     }
  
// });
