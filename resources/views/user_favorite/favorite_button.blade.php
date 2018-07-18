
@if (Auth::user()->is_favoritings($micropost->id))
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script> 
             <!--<i class="fas fa-user-plus"></i>-->
             <i class="fas fa-user-minus"></i>
            
            <!--<i class="far fa-user-minus"></i>-->
            {!! Form::submit('UnJOIN', ['class' => "btn btn-success btn-xs"]) !!}
               
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script>
            <i class="fas fa-user-plus"></i>
            {!! Form::submit('JOIN', ['class' => "btn btn-default btn-xs"]) !!}
        {!! Form::close() !!}
@endif