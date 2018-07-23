<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PointsController extends Controller
{
    
     public function store(Request $request)
    {
        $this->validate($request, [
            'point' => 'required|max:3',
        ]);
        // var_dump($request->point);return;

        $request->user()->point()->create([
            'point' => $request->point,
            'point_id' => $request->point_id
        ]);

        return redirect()->back();
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'point' => 'required|max:3',
        ]);

        $request->user()->comments()->create([
            'point' => $request->point,
        ]);

        return redirect()->back();
    }
}
