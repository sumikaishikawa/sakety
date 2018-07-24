@extends('layouts.app')

@section('content')


        <h1>目標：{{ $microposts->content }} の参加者一覧</h1>
    <div class="row">
    <div class="col-md-6">
            @include('users.users', ['users' => $users])
                  
    </div>
    <div class="col-md-6">             
                  {!! Form::open(['route' => 'comments.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-danger btn-block']) !!}
                          <input type='hidden' name='microposts_id' value={{ $microposts->id }}>
                      </div>
                  {!! Form::close() !!}

        <ul class="media-list-1">
            @foreach ($comments as $comment)
                <ul role="separator" class="divider"></ul>
                <?php $user = $comment->user; ?>
                <div class="media-1">
                    <div class="media-left">
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    </div>
                    <div class="media-body">
                        <div>
                            {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
                        </div>
                        <div class="content">
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
                </div>
<style type="text/css">
.media-1{
    margin:2em 0;
    position: relative;
    padding: 0.5em 1.5em;
    border-top: solid 2px black;
    border-bottom: solid 2px black;
}
.media-1:before, .box17:after{
    content: '';
    position: relative;
    top: -10px;
    width: 2px;
    height: -webkit-calc(100% + 20px);
    height: calc(100% + 20px);
    background-color: black;
}
.media-1:before {left: 10px;}
.media-1:after {right: 10px;}
.media-1 p {
    margin: 0; 
    padding: 0;
}
h1{font-family:'SimSun','NSimSun';
        
    }
    
.content{
    font-size: 20px;
}


</style>

            @endforeach
    </div> 
     
@endsection
    