<?php 
        $user_done = DB::table('user_done')->where([['done_id',  $microposts->id],['user_id', $user->id]])->count();
        
        // var_dump($user_done);
        // exit;
        
        ?>
       
        
        <?php
        
        if(is_null($user_done)){
        ?>
        @if (Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-md"]) !!}
                {!! Form::close() !!}
        @endif
        <?php
        
        }else{
        
        ?>
                
        @if ($user_done > 0 && Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('done', ['class' => "btn btn-success btn-md"]) !!}
                {!! Form::close() !!}
        @elseif ($user_done == 0 && Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-md"]) !!}
                {!! Form::close() !!}
        @elseif($user_done > 0 && Auth::id() != $user->id)
                <a class="btn btn-success btn-md" href="#" role="button">done</a>
        @elseif($user_done == 0 && Auth::id() != $user->id)
                <a class="btn btn-default btn-md" href="#" role="button">doneにする</a>
        @endif
        
        <?php      
        }
        ?>