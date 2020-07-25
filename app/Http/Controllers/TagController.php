<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function index(){
        return view('tags.tags')->with([
            'tags' => Tag::orderBy('created_at', 'DESC')->limit(20)->get()
        ]);
    }

    // get single
    public function show($id){
        $tag = Tag::find($id);
        return view('tags.tag')->withTag($tag);
    }

    // store
    public function store(Request $request){
        $request->validate([
            'tag_title' => 'required',
        ]);
        $item = Tag::create([
            'title' => $request->tag_title,
        ]);
        toastr()->success('Tag added successfully!', 'Great!');
        // toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!'); // i want to display this one
        // toastr()->info('Are you the 6 fingered man?'); // and this one
        // toastr()->warning('My name is Inigo Montoya. You killed my father, prepare to die!')

        return redirect()->back();
    }
}
