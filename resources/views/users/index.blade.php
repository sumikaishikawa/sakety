@extends('layouts.app')

@section('content')
@if (count($users) > 0)
<h2>ユーザー一覧</h2>
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
        <div class="col-md-6 col-md-offset-3">
            <div class="media-left">
                <!--<img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
                <img class="media-object img-rounded img-responsive" src="{{ asset(App\User::image_map($user->id))}}" alt="" width="50" height="50">
                　　　
                </div>
                    <div class="media-body">
                            {{ $user->name }}
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>
                    </div>
            </div>
        </div>
    </li>
    @endforeach
    {!! $users->render() !!}

<style type="text/css">
    h2{
        text-align: center;
    }
</style>
@endif
@endsection