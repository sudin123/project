<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Watchlist;

class WatchlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $watchlist =  \App\Watchlist::whereUserId(\Auth::user()->id)->lists('post_id');
        $posts = \App\Post::whereIn('id', $watchlist)->paginate(10);
        return view('auth.watchlist', compact('posts'));
    }

    public function store(){
        $id = $_REQUEST['id'];
        $createItemInWatchlist = Watchlist::create([
            'user_id' => \Auth::user()->id,
            'post_id' => $id
        ]);
        if($createItemInWatchlist){
            return response()->json(array('status' => 'success'));
        }else{
            return response()->json(array('status' => 'failed'));
        }

    }

    public function delete($postid){
        Watchlist::where('user_id',\Auth::user()->id)->where('post_id',$postid)->delete();
        return redirect()->route('my-wishlist')->with('status','Success!!');
    }
}
