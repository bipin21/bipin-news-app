@extends('layouts.app')
@section('content')
<div class="row">
    @foreach($users as $u)
    <div class="col-md-3 mt-2 mb-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$u->first_name}} {{$u->last_name}}</h5>
            </div>

        </div>
    </div>
    @endforeach
    <div class="col-md-12">
    {{$users->links()}}
    </div>
</div>
@endsection