        <?php 
        $user_done = DB::table('user_done')->where('done_id', '=', $microposts->id)->get();
        ?>
        
        
        @if (count($user_done) > 0)
                {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('done', ['class' => "btn btn-success btn-xs"]) !!}
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-xs"]) !!}
                {!! Form::close() !!}
        @endif