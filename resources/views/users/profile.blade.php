@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">{{$user->name}}</h1>
        <div class="row">
            <div class="col-md-3">
                email
            </div>
            <div class="col-md-3">
                {{$user->email}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @if($user->email != Auth::user()->email)
                    {{--dd(Auth::user()->followings()->find($user->id));--}}
                    @if(Auth::user()->isFollowing($user->id))
                        <form  action="{{route('users.unfollow', $user->id ) }}" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                            <button class="btn btn-default">Unfollow</button>
                        </form>
                    @else
                        <form  action="{{route('users.follow', $user->id ) }}" method="post">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                            <button class="btn btn-default">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">followers</div>
                    <ul class="list-group">
                        @foreach($user->followers as $follower)
                            <li class="list-group-item">{{$follower->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">following</div>
                    <ul class="list-group">
                        @foreach($user->followings as $following)
                            <li class="list-group-item">{{$following->name}}
                                <form class="form-inline">
                                    <input type="submit" class="btn btn-default btn-xs" value="unfollow">
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
