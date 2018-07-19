<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

use App\Micropost;// add

use App\Point;// add

use Illuminate\Support\Facades\DB; //add

class UsersController extends Controller
{
    public function index()
    {
       $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
     public function show($id)
    {
        $user = User::find($id);
        // var_dump($user->id);
        $joined_microposts = $user->joined_microposts()->get();
        $point = 500;
        $count_favoritings = $user->favoritings()->count();
        // var_dump($count_favoritings);
        $point +=  - 100 * $count_favoritings;
        // var_dump($point);
        
        foreach($joined_microposts as $joined_micropost) {
            
            $us = $joined_micropost->favoriters()->get(); //参加者

            $user_done = DB::table('user_done')
                        ->where([['done_id',  $joined_micropost->id],['user_id', $user->id]])
                        ->first();
                        
                        
            // var_dump($user_done);
            // exit;
            
            if(count($user_done) > 0 && \Auth::id() == $user_done->user_id){
                
            $count_doneings = DB::table('user_done')
                            ->where('done_id',  $joined_micropost->id)
                            ->count();
                // var_dump($count_doneings);//1ポストにdoneした人数
            $i = count($us); //参加者数
                // var_dump($i);
            if($count_doneings  > 0) {
                    
                $point += $i * 100 / $count_doneings;
            }
            else{
                $point += 0;
            }
            }
            // var_dump($point);
        }
        // exit;
    //   return;
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $microposts,
            'point00' => $point,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
     public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $favoritings = $user->favoritings()->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $favoritings,
        ];

        $data += $this->counts($user);

        return view('users.favoritings', $data);
    }
    
    public function favoriters($id)
    {
        $micropost = Micropost::find($id);
        $favoriters = $micropost->favoriters()->paginate(10);

        $data = [
            'micropost' => $micropost,
            'users' => $favoriters,
        ];

        $data += $this->counts($user);

        return view('users.favoriters', $data);
    }
    
    
        public function doneings($id)
    {
        $user = User::find($id);
        $doneings = $user->doneings()->paginate(10);
        $microposts = request::input('invisible');
        // var_dump($microposts);
        // exit;
        

        $data = [
            'user' => $user,
            'microposts' => $doneings,
        ];

        $data += $this->counts($user);

        return view('users.doneings', $data);
    }
    
    public function doners($id)
    {
        $micropost = Micropost::find($id);
        $doners = $micropost->doners()->paginate(10);

        $data = [
            'micropost' => $micropost,
            'users' => $doners,
        ];

        $data += $this->counts($user);

        return view('users.doners', $data);
    }
    
    public function points($id)
    {
        $user = User::find($id);
        $points = $user->points();

        $data = [
            'user' => $user,
            'points' => $points,
        ];

        $data += $this->counts($user);

        return view('microposts.edit', $data);
    }
    
    
}

