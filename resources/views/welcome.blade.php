@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">


@section('content')
    @if (Auth::check())
    
    <div class='post'>
     @if (Auth::user()->id == $user->id)
          {!! Form::open(['route' => 'microposts.store']) !!}
              <div class="form-group">
                  <p>Target</p>
                  {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                  <p>Deadline</p>
                  <div class="input-group input-daterange">
                    <input type="text" id="datepickerFrom" class="form-control" name="dateto_id" placeholder="開始日を選んでください" autocomplete="off">
                    <div class="input-group-addon">to</div>
                    <input type="text" id="datepickerTo" class="form-control" name="datefrom_id" placeholder="終了日を選んでください" autocomplete="off">
                  </div>
                  {!! Form::submit('Post', ['class' => 'btn btn-info btn-block']) !!}
              </div>
          {!! Form::close() !!}
    @endif
  </div>  
            
        <div class="row">
            <aside class="col-xs-2">
            </aside>
            <div class="col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else
       
            <div class=top>
                <p1>Target Share</p1>
            </div>
                
                
                <br>
                <div class="yumabtn">{!! link_to_route('signup.get', 'Sign up now!', null ) !!}</div>
            
       
    @endif
@endsection