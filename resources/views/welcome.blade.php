@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">


@section('content')
    @if (Auth::check())
    
        <div class="row">
            <aside class="col-xs-2">
            </aside>
            <div class="col-xs-8">
                	{!! Form::open(['route' => ['microposts.search']]) !!}
                        {!! Form::text('search', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                    'placeholder'=>'Search for a task...')) !!}
                         {!! Form::submit('Search',
                                                    array('class'=>'btn btn-default')) !!}
                     {!! Form::close() !!}
                     
                     
                     
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
        <div class="yumabtn">
            {!! link_to_route('signup.get', 'Sign up now!', null ) !!}
        </div>
    @endif
@endsection

