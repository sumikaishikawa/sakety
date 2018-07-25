@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <!--<img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">-->
                    <img class="media-object img-rounded img-responsive" src="{{ asset(App\User::image_map($user->id))}}" alt="" width="500" height="500">
                </div>
            </div>
            @if(Auth::user()->id == $user->id)
            <div class="panel panel-default" id='point'>
            	<div class="panel-heading">
            		<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
            		<?php 
                    print("総保有ポイント");
                    ?>
            	</div>
            	<div class="panel-body">
            	    <p>
                    <?php 
                     echo ($point00); print("pt");
                    ?>
                    </p>
            	</div>
            </div>
            @endif
            　 <!--@include('user_follow.follow_button', ['user' => $user])-->
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
               <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Joined events <span class="badge">{{ $count_favoritings }}</span></a></li>
                <!--<li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>-->
                <!--<li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>-->
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Post Target <span class="badge">{{ $count_microposts }}</span></a></li>
            </ul>
            @include('microposts.microposts', ['microposts' => $microposts])
        </div>
    </div>
@endsection


<!--css-->
<style type="text/css">

#point .panel-body {
    font-size: 25px;
}


</style>