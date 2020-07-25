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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {
    $post = Category::paginate();
    return new \App\Http\Resources\CategoriesResource($post);
    // $post = Category::paginate();
    // return new \App\Http\Resources\CategoriesResource($post);
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
