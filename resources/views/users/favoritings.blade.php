@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            　 <!--@include('user_follow.follow_button', ['user' => $user])-->
            　 @if (Auth::user()->id == $user->id)
                <?php 
                $regpoint = 500;
                $point = $regpoint - 50 * $count_favoritings;
                print("あなたの所持ポイントは"); echo ($point); print("ptです")
                ?>
                @endif
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_microposts }}</span></a></li>
                <!--<li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>-->
                <!--<li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>-->
                <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Joined events <span class="badge">{{ $count_favoritings }}</span></a></li>
                           <li role="presentation" class="{{ Request::is('users/*/doneings') ? 'active' : '' }}"><a href="{{ route('users.doneings', ['id' => $user->id]) }}">done <span class="badge">{{ $count_doneings }}</span></a></li><!--<li role="presentation" class="{{ Request::is('users/*/favoriters') ? 'active' : '' }}"><a href="{{ route('users.favoriters', ['id' => $user->id]) }}">参加者<span class="badge">{{ $count_favoriters }}</span></a></li>-->
            </ul>
            @include('microposts.microposts', ['microposts' => $microposts])
        </div>
    </div>
@endsection