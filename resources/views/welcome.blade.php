@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">


@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
            	{!! Form::open(['route' => ['microposts.search']]) !!}
                    {!! Form::text('search', null,
                                           array('required',
                                                'class'=>'form-control',
                                                'placeholder'=>'Search for a task...')) !!}
                     {!! Form::submit('Search',
                                                array('class'=>'btn btn-default')) !!}
                {!! Form::close() !!}
            </div>
            <br>
            <br>
            <br>
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            
        </div>
    </div><!--container last-->
    @else
        
        <div class=top>
            <p1>Target Share</p1>
        </div>
        <br>
        <div class="yumabtn">
            {!! link_to_route('signup.get', 'Sign up now!', null ) !!}
        </div>
    @endif
@endsection

