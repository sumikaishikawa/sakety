<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script> 

<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="micropost">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
           
        </div>
        <div class="media-body">
            <div class="bb">
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div class="aa">
                <p class="content">{!! nl2br(e($micropost->content)) !!}<maxlength="10"></maxlength></p>
                <p class="date"> start:{!! nl2br(e($micropost->dateto_id)) !!} end:{!! nl2br(e($micropost->datefrom_id)) !!}</p>
            </div>
            
            <div class="row">
                <div class="col-xs-3">
                    @include('user_favorite.favorite_button', ['user' => $user])
                </div>
                <div class="col-xs-3">
                    <i class="fas fa-users"></i>
                    <a href="{{ route('microposts.edit', ['id' => $micropost->id]) }}" class="btn btn-default btn-xs btn-inline" role="button" >Detail</a>
                  
                </div>
                <div class="col-xs-3">
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}