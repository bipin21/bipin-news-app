@extends('layouts.app')
@section('content')
<div class="mt-5 mb-5">
    <form action="{{route('save-category')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="category_title" class="col-md-2 col-form-label">Category Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="category_title" name="category_title" placeholder="Enter category title" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="category_color" class="col-md-2 col-form-label">Category Color</label>
            <div class="col-md-10">
                <input type="color" class="form-control" id="category_color" name="category_color" required>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
</div>
<div class="row">
    @foreach($categories as $category)
    <div class="col-md-3 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h1>{{$category->title}}
                    <div style="background-color: {{ $category->color }}; width:50px;height:5px;"></div>
                </h1>

            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection