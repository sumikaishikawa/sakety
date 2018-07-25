@extends('layouts.app')
   <link rel="stylesheet" href="{{ secure_asset('css/tab.css') }}">
@section('content')
<div class="container">
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
            @if(Auth::user()->id == $user->id)
            <div class="panel panel-default" id="point">
            	<div class="panel-heading">
            		<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
            		<?php 
                    print("総保有ポイント");
                    ?>
            	</div>
            	<div class="panel-body">
                    <?php 
                     echo ($point00); print("pt");
                    ?>
            	</div>
            </div>
            @endif
            　 <!--@include('user_follow.follow_button', ['user' => $user])-->
            　 
        </aside>
        <div class="col-xs-8">
            <div class="tab_area">
                <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}" id="tab_area2"><a href="{{ route('users.favoritings', ['id' => $user->id]) }}">Joined events <span class="badge">{{ $count_favoritings }}</span></a></li>
                    <!--<li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>-->
                    <!--<li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>-->
                    <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}" id="tab_area1"><a href="{{ route('users.show', ['id' => $user->id]) }}">Post Target <span class="badge">{{ $count_microposts }}</span></a></li>
                    <!--<li role="presentation" class="{{ Request::is('users/*/favoriters') ? 'active' : '' }}"><a href="{{ route('users.favoriters', ['id' => $user->id]) }}">参加者<span class="badge">{{ $count_favoriters }}</span></a></li>-->
                </ul>
                @if (Auth::user()->id == $user->id)
                      {!! Form::open(['route' => 'microposts.store']) !!}
                          <div class="form-group">
                              
                              <br>
                              <p class="target">Target</p>
                             {!! Form::textarea('content',null, ['placeholder'=>'例)ここに達成したい目標を追加してください','class' => 'form-control', 'rows' => '2']) !!}
                              <br>
                              <p class="deadline">Deadline</p>
                              <div class="input-group input-daterange">
                                <input type="text" id="datepickerFrom" class="form-control" name="dateto_id" placeholder="開始日を選んでください" autocomplete="off">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="datepickerTo" class="form-control" name="datefrom_id" placeholder="終了日を選んでください" autocomplete="off">
                              </div>
                              <br>
                              {!! Form::submit('目標新規投稿', ['class' => 'btn btn-primary btn-block']) !!}

                          </div>
                      {!! Form::close() !!}
                @endif
                @if (count($microposts) > 0)
                            @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

<!--css-->
<style type="text/css">

#point .panel-body {
    font-size: 25px;
}

.tab_area{
    text-align: center;
}

.form-group .target{
    font-family: YuGothic,'Yu Gothic','ヒラギノ角ゴシック','Hiragino Sans',sans-serif;
    font-size: 20px;
    font-weight: bold;
    position: relative;
    display: inline-block;
    padding: 0 55px;
    text-align:center;
}

.form-group .target:before, .form-group .target:after{
    content: '';
    position: absolute;
    top: 50%;
    display: inline-block;
    width: 45px;
    height: 1px;
    border-top: solid 1px black;
    border-bottom: solid 1px black;
}

.form-group .target:before {left:0;}
.form-group .target:after {right: 0;}


.form-group .deadline{
    font-family: YuGothic,'Yu Gothic','ヒラギノ角ゴシック','Hiragino Sans',sans-serif;
    font-size: 20px;
    font-weight: bold;
    position: relative;
    display: inline-block;
    padding: 0 55px;
    text-align:center;

}

.form-group .deadline:before, .form-group .deadline:after{
    content: '';
    position: absolute;
    top: 50%;
    display: inline-block;
    width: 45px;
    height: 1px;
    border-top: solid 1px black;
    border-bottom: solid 1px black;
}

.form-group .deadline:before {left:0;}
.form-group .deadline:after {right: 0;}
</style>
