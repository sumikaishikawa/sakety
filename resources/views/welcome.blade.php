@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">


@section('content')
    @if (Auth::check())
    
    <div class='post'>
     @if (Auth::user()->id == $user->id)
                  {!! Form::open(['route' => 'microposts.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2', 'placeholder' => '目標、期日、場所、コメント']) !!}
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