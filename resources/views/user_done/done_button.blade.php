        @if (App\User::select($user->id))
                {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('done', ['class' => "btn btn-success btn-xs"]) !!}
                {!! Form::close() !!}
            @else
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::submit('not done', ['class' => "btn btn-default btn-xs"]) !!}
                {!! Form::close() !!}
        @endif
        
        


