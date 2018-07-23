<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;

use App\Comment;



class MicropostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        return view('welcome', $data);
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            // add
            'dateto_id' => 'required',
            'datefrom_id' => 'required',
            
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
            // add
            'dateto_id' => $request->dateto_id,
            'datefrom_id' => $request->datefrom_id,
        ]);

        return redirect()->back();
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    
    public function edit($id)
    {
        $micropost = Micropost::find($id);
        $users = $micropost->favoriters()->paginate(10);
        $comment = Comment::where('microposts_id', $id)->get();
        $user = \Auth::user();
        $count_doneings = $micropost->doneings()->count();
        // var_dump($micropost->doneings());
        // exit;
        
        
        // $comment = Comment::get();

        return view('microposts.edit', [
            'microposts' => $micropost,
            'users' => $users,
            'comments' => $comment,
            'count_doneings' => $count_doneings,
        ]);
        
      
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return redirect()->back();
    }
    
    public function doneings($id)
    {
        $micropost = Micropost::find($id);
        $doneings = $micropost->doneings()->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $doneings,
        ];

        $data += $this->counts($user);

        return view('users.doneings', $data);
    }
    
}