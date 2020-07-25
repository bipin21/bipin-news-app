@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-8 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <p class="card-title">{{$post->title}}</p>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4 mt-2 mb-2">
        @foreach($images as $image)
        <img class="img-thumbnail" src="{{asset("storage/$image->url")}}" />
        @endforeach
        @foreach($videos as $item)
        <img src="{{asset($item->url)}}"/>
        @endforeach
    </div>

</div>

@endsection