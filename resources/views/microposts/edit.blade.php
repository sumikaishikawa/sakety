@extends('layouts.app')

@section('content')


    <h1>目標：{{ $microposts->content }} の参加者一覧</h1>
        @include('users.users', ['users' => $users])
        
                  {!! Form::open(['route' => 'comments.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                          <input type='hidden' name='microposts_id' value={{ $microposts->id }}>
                      </div>
                  {!! Form::close() !!}
                  
        <ul class="media-list">
            @foreach ($comments as $comment)
                <?php $user = $comment->user; ?>
                <li class="media">
                    <div class="media-left">
                        <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    </div>
                    <div class="media-body">
                        <div>
                            {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $comment->created_at }}</span>
                        </div>
                        <div>
                            <p>{!! nl2br(e($comment->content)) !!}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
     
@endsection
    