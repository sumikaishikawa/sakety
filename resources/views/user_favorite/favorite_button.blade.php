<?php
$today = date("Y-m-d");
?>
@if (Auth::user()->is_favoritings($micropost->id))
        <i class="fas fa-user-minus"></i>
        <a class="btn btn-success btn-xs" href="#" role="button">挑戦中</a>
            <!--期日設定-->
            @if ($today > $micropost->datefrom_id)
            <button　class="button3" type="button" disabled>
                Closed
            </button>
            @else
            
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
            
            {!! Form::submit('100ptで挑戦', ['class' => "btn btn-default btn-xs"]) !!}
        @endif
        {!! Form::close() !!}

@endif