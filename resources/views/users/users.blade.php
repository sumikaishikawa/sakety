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
    <?php $i++;?>
@endforeach
    <?php 
        $count_doneings = DB::table('user_done')->where('done_id',  $microposts->id)->get();
        // var_dump($count_doneings);
        // exit;
    ?>
    <h3>現在の参加者は{{ $i }}人です。<h3>
    <h3>現在の目標達成人数は{{ count($count_doneings) }}人です。<h3>
    <h3>現在の掛け金の合計は{{ $i * 100 }}円です。</h3>
    @if(count($count_doneings) > 0)
    <h3>現在の分配金の合計は{{ $i * 100 / count($count_doneings) }}円です。</h3>
    @else(count($count_doneings == 0))
    <h3>現在の分配金の合計は0円です。</h3>
    @endif
    
</ul>
{!! $users->render() !!}
@endif