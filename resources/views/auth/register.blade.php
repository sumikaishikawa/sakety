@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">

@section('content')
<div class="container">
    <div class="signup">
        <h1>Sign up</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group"><br>
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'employee #') !!}
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
</div>
<style type="text/css">
.container {
    font-family: 'Montserrat Subrayada', sans-serif;
    text-align: center;
}

.row {
    -moz-background-clip: padding ;
	-webkit-background-clip: padding;
	background-clip: padding-box;
	background-color: rgba(255,255,255,0.9);  /* 背景の設定 */
	border: 3px solid rgba(0,0,0,0.3);  /* ボーダーの設定 */
}

.signup {
    font-family: 'Montserrat Subrayada', sans-serif;
    text-align: center;
}

.yumabtn {
  border: 2px solid #333;
  color: gray;
  background-color: white;
  line-height: 50px;
  margin:auto;
  width:200px;
  
}

yumabtn:link { color: #0000ff; }
yumabtn:visited { color: #000080; }
yumabtn:hover { color: #ff0000; }
yumabtn:active { color: #ff8000; }


.yumabtn:hover {
  background-color: #fff;
  border-color: black;
  color: black;
}

.container {
    font-family: 'Montserrat Subrayada', sans-serif;
    text-align: center;
}

</style>
@endsection