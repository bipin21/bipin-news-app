<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    //
    public function index(Request $request){
        $categories = Category::select(['id','title'])->limit(10)->get(['id','title']);
        $posts = Post::orderBy('id','desc')->with(['user','images','videos','category'])->limit(6)->get();
        $data = [
            'categories' => $categories,
            'blogs' => $posts,
        ];
        return view('home')->with($data);
    }

    public function allBlogs(Request $request){
       
        $blogs = Post::orderBy('id','desc')->with(['category','user'])
        ->select()
        ->paginate(1);
        $data = [
            'blogs' => $blogs,
        ];
        return view('blogs')->with($data);
    }

    public function blogSingle(Request $request, $slug){
        $blog = Post::where('id', $slug)->with(['category','tags','user'])->get(['id','title','user_id','content','category_id'])->first();
        $category_ids = [$blog->category_id];
    
        $related_blogs = Post::with('user')->where('id','!=',$blog->id)->whereHas('category',function($q) use($category_ids){
            $q->whereIn('category_id', $category_ids);
        })->limit(5)->orderBY('id','desc')->get(['id','title','content','user_id']);
        
        $data = [
            'blog' => $blog,
            'related_blogs' => $related_blogs,
        ];
        return view('blogsingle')->with($data);
    }

    public function compose(View $view)
    {
        $cat = Category::select(['id','title'])->get(['id','title']);
        $view->with('categories', $cat);
    }

    public function categoryIndex(Request $request, $categoryName, $id){
        $items = Post::with('user')->whereHas('category',function($q) use($id){
            $q->where('category_id', $id);
        })->orderBY('id','desc')->select(['id','title','content','user_id'])->paginate(6);
        
        $data = [
            'blogs' => $items,
            'categoryName' => $categoryName,
        ];
        return view('category')->with($data);
    }

    public function tagIndex(Request $request, $tagName, $id){
        $items = Post::with('user')->whereHas('tags',function($q) use($id){
            $q->where('id', $id);
        })->orderBY('id','desc')->select(['id','title','post_excerpt','slug','user_id','featuredImage'])->paginate(6);
        
        $data = [
            'blogs' => $items,
            'tagName' => $tagName,
        ];
        return view('tag')->with($data);
    }

    public function search(Request $request){
        $str = $request->str;
        $blogs = Post::orderBy('id','desc')->with(['category','user','tags'])
        ->select(['id','title','category_id','content','user_id']);
        $blogs->when($str!='',function($q) use($str){
            $q->where('title','LIKE',"%{$str}%")
            ->orWhereHas('category',function($q) use($str){
                $q->where('title',$str);
            })
            ->orWhereHas('tags',function($q) use($str){
                $q->where('title',$str);
            });
        });
        $blogs = $blogs->paginate();
        $blogs->appends($request->all());
        $data = [
            'blogs' => $blogs,
        ];
        return view('blogs')->with($data);
    }
}
