        <?php 
        $user_done = DB::table('user_done')->where([['done_id',  $microposts->id],['user_id', $user->id]])->first();
        
        // var_dump($user_done);
        // exit;
        
        ?>
       
        
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
                
        @if (count($user_done) > 0 && Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('done', ['class' => "btn btn-success btn-xs"]) !!}
                {!! Form::close() !!}
        @elseif (count($user_done) == 0 && Auth::id() == $user->id)
                {!! Form::open(['route' => ['users.done', $user->id]]) !!}
                    {!! Form::hidden('invisible', $microposts->id) !!}
                    {!! Form::submit('doneにする', ['class' => "btn btn-default btn-xs"]) !!}
                {!! Form::close() !!}
        @elseif(count($user_done) > 0 && Auth::id() != $user->id)
                <a class="btn btn-success btn-xs" href="#" role="button">done</a>
        @elseif(count($user_done) == 0 && Auth::id() != $user->id)
                <a class="btn btn-default btn-xs" href="#" role="button">doneにする</a>
        @endif
        
        <?php      
        }
        ?>
        
        
        
        
        
        <!--@if (count($user_done) > 0 && Auth::id() == $user->id)-->
        <!--        {!! Form::open(['route' => ['users.undone', $user->id], 'method' => 'delete']) !!}-->
        <!--            {!! Form::hidden('invisible', $microposts->id) !!}-->
        <!--            {!! Form::submit('done', ['class' => "btn btn-success btn-xs"]) !!}-->
        <!--        {!! Form::close() !!}-->
        <!--@elseif (count($user_done) == 0 && Auth::id() == $user->id)-->
        <!--        {!! Form::open(['route' => ['users.done', $user->id]]) !!}-->
        <!--            {!! Form::hidden('invisible', $microposts->id) !!}-->
        <!--            {!! Form::submit('doneにする', ['class' => "btn btn-default btn-xs"]) !!}-->
        <!--        {!! Form::close() !!}-->
        <!--@elseif(count($user_done) > 0 && Auth::id() != $user->id)-->
        <!--        <a class="btn btn-success btn-xs" href="#" role="button">done</a>-->
        <!--@elseif(count($user_done) == 0 && Auth::id() != $user->id)-->
        <!--        <a class="btn btn-default btn-xs" href="#" role="button">doneにする</a>-->
        <!--@endif-->