@if (count($users) > 0)
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-4">
    </aside>
        <div class="col-xs-4">
            <div class="media-left">
                <!--<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 80) }}" alt="">-->
                <!--全角スペース５-->
                <img class="media-object img-rounded img-responsive" src="{{ asset(App\User::image_map($user->id))}}" alt="">
                　　　　　
            </div>
            <div class="media-body">
                <div class="username">
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                </div>
                <div>
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
    ?>
    <div class="col-md-10 col-md-offset-1" id="box">
        <div class="sanka">
            <h4>参加者</h4>
            <i class="fas fa-users fa-7x"></i>
            <p>{{ $i }}人</p>
        </div>
        <div class="tassei">
            <h4>達成者</h4>
            <i class="fas fa-trophy fa-7x"></i>
            <p>{{ count($count_doneings) }}人</p>
        </div>
        <div class="kakept">
            <h4>総Pt</h4>
            <i class="fas fa-coins fa-7x"></i>
            <p>{{ $i * 100 }}Pt</p>
        </div>
        @if(count($count_doneings) > 0)
        <div class="haito">
            <h4>配当Pt</h4>
            <i class="fas fa-registered fa-7x"></i>
            <p>{{ $i * 100 / count($count_doneings) }}Pt</p>
        </div>
        @else(count($count_doneings == 0))
        <div class="haito0">
            <h4>配当Pt</h4>
            <i class="far fa-registered fa-7x"></i>
            <p>0 Pt</p>
        </div>
        @endif
    
    <!--↓pointcss-->
    <style type="text/css">
        .username{
            font-size: 15px;
        }
    
        #box{
            display: flex;
            justify-content: space-between;
        }
    
        #box div p{
            font-size: 20px;
        }
    </style>
    <!--↑pointcss-->
    
    
</ul>

{!! $users->render() !!}
@endif