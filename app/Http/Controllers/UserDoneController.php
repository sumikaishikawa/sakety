<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDoneController extends Controller
{
    public function store(Request $request, $id)
    {
        // var_dump($request->invisible);
        // exit;
        if(\Auth::user()->id == $id){
        \Auth::user()->done($request->invisible);
        }
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        \Auth::user()->undone($request->invisible);
        return redirect()->back();
    }
}
