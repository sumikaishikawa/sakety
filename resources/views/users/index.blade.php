@extends('layouts.app')

@section('content')
@if (count($users) > 0)
<h2>ユーザー一覧</h2>
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-2">
    </aside>
        <div class="col-xs-8">
            <div class="media-left">

                <!--<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
                <img class="media-object img-rounded img-responsive" src="{{ asset(App\User::image_map($user->id))}}" alt="">
            </div>
                    <div class="media-body">
                            {{ $user->name }}
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                    </div>
            </div>
        </div>
    <aside class="col-xs-2">
    </aside>
    </li>
    @endforeach
    {!! $users->render() !!}
@endif
@endsection