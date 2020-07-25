<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    //
    public function index()
    {
        $data =  Post::with(['user', 'tags'])->orderBy('id', 'desc')->paginate();
        return view('posts.posts')->withPosts($data);
    }

    //
    public function newPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.new-post')->with([
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    // get single
    public function show($id)
    {
        $data = Post::find($id);
        return view('posts.post')->with([
            'post' => $data,
            'images' => $data->images,
            'videos' => $data->videos,
        ]);
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
        ]);
        $user = Auth::user();
        $post = new Post();
        $post->title = $request->input('post_title');
        $post->content = $request->input('post_content');
        $post->category_id = $request->input('post_category');
        $post->user_id = $user->id;
        $post->post_type = 'text';
        $post->save();

        if ($request->has('post_tags')) {
            foreach ($request->input('post_tags') as $id) {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $id,
                ]);
            }
        }

        if ($request->hasFile('post_images')) {
            $counter = 0;
            $images = $request->file('post_images');
            foreach ($images as $img) {
                $path = $img->store('public');
                $image = new Image();
                $image->description = '';
                $image->url = $path;
                $image->post_id = $post->id;

                $image->featured = ($counter == 0) ?  true : false;

                $image->save();
                $counter++;
            }
        }

        return redirect(route('posts'));
    }
}
