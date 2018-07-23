@extends('layouts.app')

@section('content')
@if (count($users) > 0)
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-4">
    </aside>
        <div class="col-xs-8">
            <div class="media-left">
                <!--<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
                <img class="media-object img-rounded img-responsive" src="{{ asset(App\User::image_map($user->id))}}" alt="">
                </div>
                    <div class="media-body">
                        <div>
                            {{ $user->name }}
                        </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                </div>
            </div>
        </div>
    </li>
    @endforeach
    {!! $users->render() !!}
@endif
@endsection