@extends('layouts.app')

<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">


@section('content')
    @if (Auth::check())
    <!--囲い枠-->
    <div class="kakomi-maru2">
    <!--新規投稿-->
                    @if (Auth::user()->id == $user->id)
                      {!! Form::open(['route' => 'microposts.store']) !!}
                          <div class="form-group">
                              
                              <br>
                              <p class="target">Target</p>
                             {!! Form::textarea('content',null, ['placeholder'=>'例)ここに達成したい目標を追加してください','class' => 'form-control', 'rows' => '2']) !!}
                              <br>
                              <p class="deadline">Deadline</p>
                              <div class="input-group input-daterange">
                                <input type="text" id="datepickerFrom" class="form-control" name="dateto_id" placeholder="開始日を選んでください" autocomplete="off">
                                <div class="input-group-addon">to</div>
                                <input type="text" id="datepickerTo" class="form-control" name="datefrom_id" placeholder="終了日を選んでください" autocomplete="off">
                              </div>
                              <br>
                              {!! Form::submit('目標新規投稿', ['class' => 'btn btn-primary btn-block']) !!}

                          </div>
                      {!! Form::close() !!}
                @endif
    <!--新規投稿ここまで-->
        </div>                 
    <!--囲い枠                 -->
    
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

<style type="text/css">
    p{
        position: relative;
        text-align: center;
        color:black;
        font-family: 'Montserrat Subrayada';
        font-size: 150%;
    }
    .kakomi-maru2 {
     margin: 2em auto;
     padding: 1em;
     width: 90%;
     color: #666666; /*文字色*/
     border: 2px solid #000; /*線の太さ・色*/
     background-color: #fff; /*背景色*/
     box-shadow: -2px 5px 5px #A9A9A9; /*影*/
     border-radius: 20px; /*角の丸み*/
    }
</style>