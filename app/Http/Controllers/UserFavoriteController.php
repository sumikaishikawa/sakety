<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->favorites($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavorites($id);
        return redirect()->back();
    }
}
