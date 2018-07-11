<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

use App\Micropost;// add

use App\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $comments = $user->feed_comments()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'comments' => $comments,
            ];
        }
        return view('welcome', $data);
    }
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
       // var_dump($request->microposts_id);return;

        $request->user()->comments()->create([
            'content' => $request->content,
            'microposts_id' => $request->microposts_id
        ]);

        return redirect()->back();
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->comments()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
    }
    
    public function edit($id)
    {
        $comment = Comment::find($id);
        $users = $comment->favoriters()->paginate(10);

        return view('microposts.edit', [
            'comments' => $comment,
            'users' => $users,
        ]);
    }
    
    public function destroy($id)
    {
        $comment = \App\Comment::find($id);

        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }
        return redirect()->back();
    }
}
