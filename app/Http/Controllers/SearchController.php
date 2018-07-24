<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;// add

class SearchController extends Controller
{
    public function search(Request $request)
{
        // Gets the query string from our form submission 
        $query = $request->search;
        // Returns an array of articles that have the query string located somewhere within 
        // our articles titles. Paginates them so we can break up lots of search results.
        $microposts = \DB::table('microposts')->where('content', 'LIKE', '%' . $query . '%')->paginate(10);
      //var_dump($microposts);  
        // returns a view and passes the view the list of articles and the original query.
        //return view('microposts.search', compact('microposts', 'query'));
        return view('microposts.search', compact('microposts', 'query'));
}
}
