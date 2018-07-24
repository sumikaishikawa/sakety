@extends('layouts.app')

@section('content')

        <?php  $microposts->datefrom_id; ?>


        <h1>目標：{{ $microposts->content }} の参加者一覧</h1>
    <div class="row">
    <div class="col-md-6">
<!--ここからuser-->
@if (count($users) > 0)
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-4">
    </aside>
        <div class="col-xs-8">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                </div>
                    <div class="media-body">
                        <div>
                            {{ $user->name }}
                        </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
<!--ここからdone_button-->
<?php 
        $user_done = DB::table('user_done')->where([['done_id',  $microposts->id],['user_id', $user->id]])->count();
        $today = date("Y-m-d");
        ?>
       
        @if ($today > $microposts->datefrom_id)
            <button　class="button3" type="button" disabled>
                終了しました。
            </button>
        
        @else
                
        <?php
        if(is_null($user_done)){
        ?>
        @if (Auth::id() == $user->id)



                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-xs"]) !!}
                {!! Form::close() !!}
        @endif
        <?php
        
        }else{
        
        ?>
                
        @if ($user_done > 0 && Auth::id() == $user->id)
                
                　　　　　
                
                {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('done', ['class' => "btn btn-success btn-xs"]) !!}
                {!! Form::close() !!}
        @elseif ($user_done == 0 && Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-xs"]) !!}
                {!! Form::close() !!}
        @elseif($user_done > 0 && Auth::id() != $user->id)
                <a class="btn btn-success btn-xs" href="#" role="button">done</a>
        @elseif($user_done == 0 && Auth::id() != $user->id)
                <a class="btn btn-default btn-xs" href="#" role="button">doneにする</a>
        @endif
        
        <?php      
        }
        ?>
        @endif
        <!--ここまでdone_button-->

    
                      
                </div>
            </div>
        </div>
    </li>
    <?php $i++;?>
@endforeach
    <?php 
        $count_doneings = DB::table('user_done')->where('done_id',  $microposts->id)->get();
        // var_dump($count_doneings);
        // exit;
    ?>
    <h3>現在の参加者<p1>{{ $i }}人</p1>。</h3>
    <h3>現在の目標達成人数<p1>{{ count($count_doneings) }}人</p1>。</h3>
    <h3>現在の掛けポイントは合計<p1>{{ $i * 100 }}ポイント</p1>!!</h3>
    @if(count($count_doneings) > 0)
    <h3>現在達成者への配当ポイントは<p1>{{ $i * 100 / count($count_doneings) }}ポイント</p1>!!</h3>
    @else(count($count_doneings == 0))
    <h3>現在あなたへの配当ポイントは<p1>0ポイント<p1>です。</h3>
    <h3>期限までに達成しましょう!</h3>
    @endif
    
    <style type="text/css">
        h3{font-family:'NSimSun','SimSun';
        }
        p1{font-weight:700;
        }
        
    </style>
    
</ul>

<style type="text/css">
    .p1{
        
    }
</style>
{!! $users->render() !!}
@endif
<!--ここまでuser-->


                  
    </div>
    <div class="col-md-6">             
                  {!! Form::open(['route' => 'comments.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('新規コメント投稿', ['class' => 'btn btn-danger btn-block']) !!}
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