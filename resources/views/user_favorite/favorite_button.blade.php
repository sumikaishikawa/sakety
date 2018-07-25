<?php
$today = date("Y-m-d");
?>
@if (Auth::user()->is_favoritings($micropost->id))
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script> 
             <!--<i class="fas fa-user-plus"></i>-->
             <i class="fas fa-user-minus"></i>
            
            <!--期日設定-->
            @if ($today > $micropost->datefrom_id)
            <button　class="button3" type="button" disabled>
                Closed
            </button>
            @else
            
            {!! Form::submit('UnJOIN', ['class' => "btn btn-success btn-xs"]) !!}
                           
        {!! Form::close() !!}
        @endif
@else

        {!! Form::open(['route' => ['users.favorite', $micropost->id]]) !!}
            <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script>
            <i class="fas fa-user-plus"></i>
            
            <!--期日設定-->
            @if ($today > $micropost->datefrom_id)
            <button　class="button3" type="button" disabled>
                Closed
            </button>
            @else
            
            {!! Form::submit('JOIN', ['class' => "btn btn-default btn-xs"]) !!}
        @endif
        {!! Form::close() !!}

@endif