<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    //
     // Get all posts
     public function index(){
        $items = User::paginate();
        return UserResource::collection($items);
    }

    public function posts($id){
        $item = User::find($id);
        $posts = $item->posts;
        return PostResource::collection($posts);
    }
}
