@extends('layouts.app')

@section('content')

    <h1>目標：{{ $microposts->content }} の参加者一覧</h1>
    
        @include('users.users', ['users' => $users])
@endsection