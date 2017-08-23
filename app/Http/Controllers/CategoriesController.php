<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */

    public function show($hierarchy)
    {
        $price = Input::get('price');
        $order = Input::get('order');
        $categories = explode('/', $hierarchy);
        $main = Category::where('slug', end($categories))->first();
        reset($categories);
        if ($main)
        {
            $ancestors = $main->getAncestors();
            $valid = true;
            foreach ($ancestors as $i => $category)
            {
                if ($category->slug !== $categories[$i])
                {
                    $valid = false;
                    break;
                }
            }
            if ($valid)
            {
                $slug = end($categories);
                $category = Category::where('slug',$slug)->first();
                $categories  = $category->getDescendantsAndSelf()->lists('id');
                if(!empty($price) && $price == 'high'){
                    $posts = Post::whereIn('category_id', $categories)->whereStatus('publish')->orderBy('price','DESC')->paginate(10);
                }elseif(!empty($price) && $price == 'low'){
                    $posts = Post::whereIn('category_id', $categories)->whereStatus('publish')->orderBy('price','ASC')->paginate(10);
                }elseif(!empty($order) && $order == 'popular'){
                    $posts = Post::whereIn('category_id', $categories)->whereStatus('publish')->orderBy('view_count','ASC')->paginate(10);
                }elseif(!empty($order) && $order == 'older'){
                    $posts = Post::whereIn('category_id', $categories)->whereStatus('publish')->oldest()->paginate(10);
                }else{
                    $posts = Post::whereIn('category_id', $categories)->whereStatus('publish')->latest()->paginate(10);
                }

                return view('category-ads', compact('posts', 'category', 'price','order'));
            }
        }
        \App::abort('404');
    }

    public function SelectSubCategory()
    {
        $id = $_REQUEST['id'];
        $cat = \App\Category::findorFail($id);
        $children = $cat->children()->get();
        if (count($children) > 1) {
            $returnHTML = view('posts.subcatajax', compact('children'))->render();
            return response()->json(array('status' => 'success', 'html' => $returnHTML));
        } else {
            return response()->json(array('status' => 'nochildren'));
        }
    }


}
