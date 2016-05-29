@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <a href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
