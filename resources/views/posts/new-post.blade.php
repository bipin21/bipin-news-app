@extends('layouts.app')
@section('content')
<div class="col-md-12 mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{route('save-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="category_title" class="col-md-2 col-form-label">Post Title</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter post title" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="category_color" class="col-md-2 col-form-label">Post Content</label>
                    <div class="col-md-10">
                        <textarea type="textarea" placeholder="Post Content" class="form-control" id="post_content" cols="30" rows="10" name="post_content" required> </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_category" class="col-md-2 col-form-label">Post Category</label>
                    <div class="col-md-10">
                        <select class="form-control" id="post_category" name="post_category" required>
                            <option selected>Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_tags" class="col-md-2 col-form-label">Post Tags</label>
                    <div class="col-md-10">
                        <select class="form-control" id="post_tags" name="post_tags[]" multiple>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="post_images" class="col-md-2 col-form-label">Post Images</label>
                    <div class="col-md-10">
                       <input type="file" class="form-control" name="post_images[]" id="post_images" multiple />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection