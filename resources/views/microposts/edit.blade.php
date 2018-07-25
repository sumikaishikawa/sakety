@extends('layouts.app')

@section('content')


<?php
    $today = date("Y-m-d");
?>
    <h1><span><i class="far fa-check-circle"></i> {{ $microposts->content }} </span></h1>
    
    <!--締め切り表示-->
    @if ($today < $microposts->datefrom_id)
            <h2><i class="fas fa-bell"></i>  期限: {{ $microposts->datefrom_id }} </h2>
    @elseif ($today == $microposts->datefrom_id)
            <h2><i class="fas fa-exclamation-triangle"></i>  締め切りは本日までです。 </h2>
    @elseif ($today > $microposts->datefrom_id) 
            <h2><i class="far fa-handshake"></i>  既に終了しました。 </h2>
    @endif 
    <!--締め切り表示ここまで-->
    
    <hr class="fade-2">
    

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
            @include('users.users', ['users' => $users])
                  {!! Form::open(['route' => 'comments.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                          <input type='hidden' name='microposts_id' value={{ $microposts->id }}>
                      </div>
                  {!! Form::close() !!}
    </div>
    <div class="col-md-8 col-md-offset-2">             
        <ul class="media-list">
            @foreach ($comments as $comment)
                <?php $user = $comment->user; ?>
                <li class="media">
                    <div class="media-left">
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    </div>
                    <div class="media-body">
                        <div>
                            {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
                        </div>
                        <div>
                            <p>{!! nl2br(e($comment->content)) !!}</p>
                        </div>
                        <div class="button-inline button-group">
                        <!--@if (Auth::id() == $comment->user_id)-->
                        <!--    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}-->
                        <!--        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}-->
                        <!--    {!! Form::close() !!}-->
                        <!--@endif -->
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div> 

<style type="text/css">
    h1{
        position: relative;
        text-align: center;
    }
    
    h1 span{
        position: relative;
        z-index: 2;
        display: inline-block;
        margin: 0 2.5em;
        padding: 0 1em;
        background-color: #fff;
        text-align: left;
    }
    
    h1::before {
        position: absolute;
        top: 50%;
        z-index: 1;
        content: '';
        display: block;
        width: 100%;
        height: 1px;
        background-color: #ccc;
    }
    
    h2 {
        position: relative;
        text-align: center;
        color: red;
        font-family: 'Montserrat Subrayada';
    }
    
    .fade-2 {
      border-width: 0 0 1px;
      border-image: linear-gradient(
        90deg,
        hsla(0, 0%, 100%, 0),
        hsla(0, 0%, 100%, 0.5) 50%,
        hsla(0, 0%, 100%, 0) 100%) 0 0 100%;
      border-style: solid;
    }

</style>
     
@endsection

    