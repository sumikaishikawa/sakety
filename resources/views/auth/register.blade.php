@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">

@section('content')
    <div class="signup">
        <h1>Sign up</h1>
    </div>

    <div class="row1">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group"><br>
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'ID') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                <button class=yumabtn type="submit">Sign Up</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection