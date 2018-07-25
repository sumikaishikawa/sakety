@extends('layouts.app')

@section('content')


    <h1><span>目標：{{ $microposts->content }} の参加者一覧</span></h1>
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
    
    
</style>
     
@endsection

    