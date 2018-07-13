@if (count($users) > 0)
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-4">
    </aside>
        <div class="col-xs-8">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                </div>
                    <div class="media-body">
                        <div>
                            {{ $user->name }}
                        </div>
                    <div>
                        <p>{!! link_to_route('users.show', 'View profile', ['id' => $user->id]) !!}</p>

                @include('user_done.done_button', ['user' => $user])

                       
                    <!--    @if (Auth::id() == $user->id)-->
        
                    <!--     {!! Form::open(['route' => ['users.undone', $user->id], ]) !!}-->
                    <!--         {!! Form::submit('NotDone', ['class' => "btn btn-success btn-xs"]) !!}-->
                    <!--       {!! Form::close() !!}-->
                    <!--                    @else-->
                    <!--    {!! Form::open(['route' => ['users.done', $user->id]]) !!}-->
                    <!--    {!! Form::submit('Done', ['class' => "btn btn-default btn-xs"]) !!}-->
                    <!--        {!! Form::close() !!}-->
                    <!--@endif-->
                      
                </div>
            </div>
        </div>
    </li>
    <?php $i++; ?>
@endforeach
<h3>現在の参加者は{{ $i }}人です。<h3>
</ul>
{!! $users->render() !!}
@endif