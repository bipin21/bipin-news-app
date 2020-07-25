@extends('layouts.app')
@section('content')
<div class="mt-5 mb-5">
    <form action="{{route('save-tag')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="tag_title" class="col-md-2 col-form-label">Tag Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="tag_title" name="tag_title" placeholder="Enter tag title" required>
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
    @foreach($tags as $item)
    <div class="col-md-3 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h1>{{$item->title}}</h1>

            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection