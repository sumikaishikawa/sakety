<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 

use App\Micropost;// add

use App\Point;// add


class PointController extends Controller
{
     public function index()
    {
        return view('microposts.point');
 
    }

}