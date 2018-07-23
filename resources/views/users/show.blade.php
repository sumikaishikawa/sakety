@extends('layouts.app')
   <link rel="stylesheet" href="{{ secure_asset('css/tab.css') }}">
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
                <div>
                    <span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                    <?php 
                    print("所持ポイント"); echo ($point00);
                    ?>
                </div>
            </div>
            　 <!--@include('user_follow.follow_button', ['user' => $user])-->
            　 
        </aside>
        <div class="col-xs-8">
            <div class="tab_area">
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}" id="tab_area1"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_microposts }}</span></a></li>
                    <!--<li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>-->
                    <!--<li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>-->
                    <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}" id="tab_area2"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Joined events <span class="badge">{{ $count_favoritings }}</span></a></li>
                    <!--<li role="presentation" class="{{ Request::is('users/*/favoriters') ? 'active' : '' }}"><a href="{{ route('users.favoriters', ['id' => $user->id]) }}">参加者<span class="badge">{{ $count_favoriters }}</span></a></li>-->
                </ul>
                @if (Auth::user()->id == $user->id)
                      {!! Form::open(['route' => 'microposts.store']) !!}
                          <div class="form-group">
                              <p>Target</p>
                              {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                              <p>Deadline</p>
                              <div class="input-group input-daterange">
                                <input type="text" id="datepickerFrom" class="form-control" name="dateto_id" placeholder="開始日を選んでください" autocomplete="off">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="datepickerTo" class="form-control" name="datefrom_id" placeholder="終了日を選んでください" autocomplete="off">
                              </div>
                              {!! Form::submit('Post', ['class' => 'btn btn-danger btn-block']) !!}

                          </div>
                      {!! Form::close() !!}
                @endif
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    </div>
    
@endsection