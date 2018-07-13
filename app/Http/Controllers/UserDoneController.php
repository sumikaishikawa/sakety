<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDoneController extends Controller
{
    public function store(Request $request, $id)
    {
        if(\Auth::user()->id == $id){
        \Auth::user()->done($id);
        }
                return redirect()->back();

    }

    public function destroy($id)
    {
        \Auth::user()->undone($id);
        return redirect()->back();
    }
}
