<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;
use App\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    
     // Get all posts
     public function index(){
        $posts = Post::with(['user','images'])->paginate();
        return new PostsResource($posts);
    }
}
