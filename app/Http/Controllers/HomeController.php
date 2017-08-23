<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Str;
use App\Helpers\PostHelper;
use Image;

class HomeController extends Controller
{
    public function frontpage(){
        $latest_posts = Post::with('category')->whereStatus('publish')->latest()->paginate(12);
        $popular_posts = Post::whereStatus('publish')->orderBy('view_count', 'DESC')->paginate(6);
        $featured_posts = Post::where('is_featured', 1)->whereStatus('publish')->latest()->paginate(12);
        return view('frontpage', compact('latest_posts','featured_posts','popular_posts'));

    }

    public function popularAds(){
        $posts = Post::whereStatus('publish')->orderBy('view_count','DESC')->paginate(10);
        return view('popular-post', compact('posts'));
    }

    public function recentAds(){
        $posts = Post::with('category')->whereStatus('publish')->latest()->paginate(10);
        return view('recent-post', compact('posts'));
    }

}
