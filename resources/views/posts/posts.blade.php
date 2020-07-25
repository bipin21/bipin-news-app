@extends('layouts.app')
@section('content')

<div class="row">
    @foreach($posts as $item)
    <div class="col-md-4 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$item->user->first_name}} {{$item->user->last_name}}</h5>
                <p class="card-text">{{$item->title}}</p>
                <a href="{{route('show-post',['id' => $item->id])}}" class="btn btn-info">Read More</a>   
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="col-md-12">
{{$posts->links()}}
</div>

@endsection