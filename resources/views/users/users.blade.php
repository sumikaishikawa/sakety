@if (count($users) > 0)
<ul class="media-list">
    <?php $i=0; ?>
@foreach ($users as $user)
    <li class="media">
    <aside class="col-xs-4">
    </aside>
        <div class="col-xs-4">
            <div class="media-left">
                <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 80) }}" alt="">
            </div>
            <div class="media-body">
                <div class="username">
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                </div>
                <div>
                    @include('user_done.done_button', ['user' => $user])
                </div>
            </div>
        </div>
    </li>
    <?php $i++;?>
@endforeach
    <?php 
        $count_doneings = DB::table('user_done')->where('done_id',  $microposts->id)->get();
    ?>
    <div class="col-md-6 col-md-offset-3" id="box">
        <div class="sanka">
            <h4>参加者</h4>
            <i class="fas fa-users fa-7x"></i>
            <p>{{ $i }}人</p>
        </div>
        <div class="tassei">
            <h4>達成者</h4>
            <i class="fas fa-trophy fa-7x"></i>
            <p>{{ count($count_doneings) }}人</p>
        </div>
        <div class="kakept">
            <h4>総Pt</h4>
            <i class="fas fa-coins fa-7x"></i>
            <p>{{ $i * 100 }}Pt</p>
        </div>
        @if(count($count_doneings) > 0)
        <div class="haito">
            <h4>配当Pt</h4>
            <i class="fas fa-registered fa-7x"></i>
            <p>{{ $i * 100 / count($count_doneings) }}Pt</p>
        </div>
        @else(count($count_doneings == 0))
        <div class="haito0">
            <h4>配当Pt</h4>
            <i class="far fa-registered fa-7x"></i>
            <p>0 Pt</p>
        </div>
        @endif
    
    <!--↓pointcss-->
    <style type="text/css">
        .username{
            font-size: 15px;
        }
    
        #box{
            display: flex;
            justify-content: space-between;
        }
    
        #box div p{
            font-size: 20px;
        }
    </style>
    <!--↑pointcss-->
    
    
</ul>

{!! $users->render() !!}
@endif