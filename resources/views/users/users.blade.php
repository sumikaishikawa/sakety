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
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email) }}" alt="">
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
    <h3>現在の参加者<p1>{{ $i }}人</p1>。</h3>
    <h3>現在の目標達成人数<p1>{{ count($count_doneings) }}人</p1>。</h3>
    <h3>現在の掛けポイントは合計<p1>{{ $i * 100 }}ポイント</p1>!!</h3>
    @if(count($count_doneings) > 0)
    <h3>現在あなたへの配当ポイントは<p1>{{ $i * 100 / count($count_doneings) }}ポイント</p1>!!</h3>
    @else(count($count_doneings == 0))
    <h3>現在あなたへの配当ポイントは<p1>0ポイント<p1>です。</h3>
    <h3>期限までに達成しましょう!</h3>
    @endif
    
    <style type="text/css">
        h3{font-family:'NSimSun','SimSun';
        }
        p1{font-weight:700;
        }
        
    </style>
    
</ul>

<style type="text/css">
    .p1:
            
</style>
{!! $users->render() !!}
@endif