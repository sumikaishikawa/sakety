@if (Auth::user()->is_favoritings($micropost->id))
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('UnJOIN', ['class' => "btn btn-success btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            {!! Form::submit('JOIN', ['class' => "btn btn-default btn-xs"]) !!}
        {!! Form::close() !!}
@endif