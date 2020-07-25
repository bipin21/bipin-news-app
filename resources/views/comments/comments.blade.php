@extends('layouts.app')
@section('content')

<div class="row">
    @foreach($comments as $item)
    <div class="">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$item->user->first_name}} {{$item->user->last_name}}</h5>
                <p class="card-text">{{$item->content}}</p>
                <a href="{{$item->post->link()}}" class="btn btn-info">Go to Post</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="col-md-12">
{{$comments->links()}}
</div>

@endsection