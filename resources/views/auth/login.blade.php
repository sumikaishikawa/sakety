@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">

@section('content')
    <div class="login">
        <h1>Log in</h1>
    </div>

    <div class="row2">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
            
                <div class="form-group"> <br>
                    {!! Form::label('email', 'ID') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                
               <button class=yumabtn type="submit">Login</button>
                
                
            {!! Form::close() !!}

            <p>New user? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
@endsection