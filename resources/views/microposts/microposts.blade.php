<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <div class="container"  id="micropost">
        <div class="row">
            <li class="col-xs-12">
                    <div class="media-left">
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    </div>
                    <div class="media-body">
                        <div class="bb">
                            {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                        </div>
                    </div>
                <div class="row">
                    <div class="aa">
                            <p class="content">{!! nl2br(e($micropost->content)) !!}<maxlength="10"></maxlength></p>
                            <p class="date"> start:{!! nl2br(e($micropost->dateto_id)) !!}<br> end:{!! nl2br(e($micropost->datefrom_id)) !!}</p>
                    </div>
                    <div class="col-xs-4">
                        @include('user_favorite.favorite_button', ['user' => $user])
                    </div>
                    <div class="col-xs-4">
                        <i class="fas fa-users"></i>
                        <a href="{{ route('microposts.edit', ['id' => $micropost->id]) }}" class="btn btn-default btn-xs btn-inline" role="button" >Detail</a>
                    </div>
                    <div class="col-xs-4">
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </div>
                </div><!--buttonrow-->
            </li>
        </div><!--全体row-->
    </div><!--container-->
    
<style type="text/css">
    /*microposts*/

    #micropost{
        padding: 0.5em 1em;
        margin: 2em 0;
        color: #6091d3;/*文字色*/
        background: #FFF;
        border: solid 1px #000000;/*線*/
        border-radius: 10px;/*角の丸み*/
    }
    
    #micropost .bb{
        /*font-size: 15px;*/
    }
    
    
    #micropost .aa .content{
         /*font-size: 30px;*/
         /*font-weight: bolder;*/
         /* color: #000;*/
         /* text-shadow:0 2px 1px rgba(255, 255, 255, 0.5);*/
         /* word-wrap: normal;*/
         /* width: 19em;*/
         /* font-family:'SimSun','NSimSun';*/
    
    }
    
    #micropost .aa .date{
        /*font-size: 20px;*/
        /*color: black;*/
        /*opacity: 0.5;*/
    }
    
    .post{
       /*width:750px;*/
       /*margin:auto;*/
       }
</style>

@endforeach
</ul>
{!! $microposts->render() !!}