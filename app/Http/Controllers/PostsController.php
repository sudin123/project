<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Response;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Str;
use Image;
use Validator;
use App\Gallery;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'JsonOutput', 'searchPosts']]);
    }

    public function index()
    {

    }

    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $post->increment('view_count');
        $cat = $post->category_id;
        $category = \App\Category::where('id', $cat)->first();
        $categories = $category->getDescendantsAndSelf()->lists('id');
        $relatedPosts = Post::whereIn('category_id', $categories)->whereStatus('publish')->where('id', '<>', $post->id)->paginate(5);
        return view('single-ads', compact('post', 'relatedPosts'));
    }

    public function searchPosts()
    {
        // Gets the query string from our form submission
        $search = Input::get('q');
        $city = Input::get('city');
        $category = Input::get('category');
        $pmax = Input::get('pmax');
        $pmin = Input::get('pmin');
        $condition = Input::get('condition');

        $query = Post::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')->orWhere('content', 'like', '%' . $search . '%');
            });
        }
        if ($city) {
            $query->where('city', $city);
        }
        if ($category) {
            $cat = \App\Category::findOrFail($category);
            $categories = $cat->getDescendantsAndSelf()->lists('id');
            $query->whereIn('category_id', $categories);
        }

        if ($pmax) {
            $query->where('price', '<=', $pmax);
        }
        if ($pmin) {
            $query->where('price', '>=', $pmin);
        }
        if ($condition) {
            $query->where('condition', $condition);
        }
        $query->where('status', 'publish');
        $posts = $query->paginate(12);
        // returns a view and passes the view the list of articles and the original query.
        return view('searchresults', compact('posts', 'search', 'city', 'category', 'pmax', 'pmin', 'condition'));
    }


    public function selectCategory()
    {
        $user = \Auth::user();
        if ($user->hasCompleteProfile()) {
            $categories = \App\Category::all()->toHierarchy();
            return view('posts.categories', compact('categories'));
        } else {
            if ($user->isVendor()) {
                return redirect()->route('edit-company-profile')->with('error', 'Please Update Your Company Profile First to Create Ad.');
            } else {
                return redirect()->route('my-profile')->with('error', 'Please Update Your Profile First to Create Ad.');
            }
        }
    }

    public function ShowCreate()
    {
        $cat_id = Input::get('cat_id');
        $user = \Auth::user();
        if ($user->hasCompleteProfile()) {
            if (empty($cat_id)) {
                return redirect()->route('select-category')->with('error', 'Please Select Category First!!');
            }
            return view('posts.create', compact('cat_id'));
        } else {
            if ($user->isVendor()) {
                return redirect()->route('edit-company-profile')->with('error', 'Please Update Your Comapny Profile First to Create Ad.');
            } else {
                return redirect()->route('my-profile')->with('error', 'Please Update Your Profile First to Create Ad.');
            }

        }
    }

    public function savePost(PostRequest $request)
    {
//        $results = Input::all();
//        dd($results);
        $user = \Auth::user();
        if ($user->hasCompleteProfile()) {
            $cat_id = $request->input('cat_id');
            $post = new Post;
            $slug = Str::slug(str_replace("-", "", $request->input('title')));
            $slug = str_random(6) . "-" . $slug . '-ad-' . (\Auth::user()->id + rand(0, 100));
            $slugCount = count(\App\Post::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
            $slug = ($slugCount >= 1) ? "{$slug}-{$slugCount}" : $slug;
            $post->slug = $slug;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->price = $request->input('price');
            $post->status = 'publish';
            $post->user_id = $user->id;
            $post->category_id = $request->input('cat_id');
            $post->city = $user->user_profile->city;
            $post->condition = $request->input('condition');
            $post->is_negotiable = $request->input('is_negotiable');

            if ($post->save()) {
                $postid = $post->id;
                //Img uploading...
                $fileName = 'no-image.png';
                if (Input::hasFile('featuredimage')) {
                    $file = Input::file('featuredimage');
                    $originalpath = 'uploads/original';
                    $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $fileName = str_random(6) . "_" . $name . '.' . $file->getClientOriginalExtension();
                    $file->move($originalpath, $fileName);
                    $img = 'uploads/original/' . $fileName;
                    Image::make($img)->insert('watermark.png', 'center')->save('uploads/' . $fileName);
                    $path = 'uploads/original/';
                    \File::delete($path . $fileName);
                }
                $node = \App\Category::findorFail($request->input('cat_id'));
                $realestateArray = array('_property_type' => $request->input('property_type'), '_property_location' => $request->input('property_location'), '_access_road' => $request->input('access_road'), '_land_size' => $request->input('land_size'), '_bedrooms' => $request->input('bedrooms'), '_bathroom' => $request->input('bathroom'), '_livingroom' => $request->input('livingroom'), '_water_supply' => $request->input('water_supply'), '_furnished' => $request->input('furnished'), '_features' => json_encode($request->input('features')));
                $carsArray = array('_make_year' => $request->input('make_year'), '_kilometers' => $request->input('kilometers'), '_colour' => $request->input('colour'), '_engine_cc' => $request->input('engine_cc'), '_fuel_type' => $request->input('fuel_type'), '_transmission' => $request->input('transmission'),);
                $motorcycleArray = array('_lot_no' => $request->input('lot_no'), '_zone' => $request->input('zone'), '_make_year' => $request->input('make_year'), '_kilometers' => $request->input('kilometers'), '_milage' => $request->input('milage'), '_colour' => $request->input('colour'), '_engine_cc' => $request->input('engine_cc'),);
                $DesktopArray = array('_processor' => $request->input('processor'), '_ram' => $request->input('ram'), '_graphics_card' => $request->input('graphics_card'), '_harddisk' => $request->input('harddisk'), '_moniter_desc' => $request->input('moniter_desc'), '_features' => json_encode($request->input('features')));
                $laptopArray = array('_processor' => $request->input('processor'), '_ram' => $request->input('ram'), '_graphics_card' => $request->input('graphics_card'), '_harddisk' => $request->input('harddisk'), '_screen_size' => $request->input('screen_size'), '_features' => json_encode($request->input('features')));
                $handsetArray = array('_sim_slot' => $request->input('sim_slot'), '_camera' => $request->input('camera'), '_smartphone_os' => $request->input('smartphone_os'), '_screen_size' => $request->input('screen_size'), '_cpu_core' => $request->input('cpu_core'), '_ram' => $request->input('ram'), '_internal_storage' => $request->input('internal_storage'), '_features' => json_encode($request->input('features')),);
                if ($node->parent_id == 16) {
                    \App\PostMeta::initPostMeta($post->id, $carsArray);
                }
                if ($node->parent_id == 186) {
                    \App\PostMeta::initPostMeta($post->id, $realestateArray);
                }
                if ($node->parent_id == 39) {
                    \App\PostMeta::initPostMeta($post->id, $motorcycleArray);
                }
                if ($node->id == 93) {
                    \App\PostMeta::initPostMeta($post->id, $DesktopArray);
                }
                if ($node->id == 97) {
                    \App\PostMeta::initPostMeta($post->id, $laptopArray);
                }
                if ($node->parent_id == 135) {
                    \App\PostMeta::initPostMeta($post->id, $handsetArray);
                }
                $metaArr = array('_featured_image' => $fileName, '_post_unique_id' => 'SLN' . $post->id, '_is_used_for' => $request->input('is_used_for'), '_is_home_delivary' => $request->input('home_delivary'), '_delivary_area' => $request->input('delivaryarea'), '_delivary_charges' => $request->input('delivary_charges'), '_warranty_type' => $request->input('warranty'), '_warrenty_period' => $request->input('warranty_period'), '_warranty_includes' => $request->input('warranty_includes'),);
                \App\PostMeta::initPostMeta($post->id, $metaArr);
                return \Redirect::route('add-images', ['ad_id' => $postid])->with('message', 'Ad saved correctly!!! Please Upload Images');
            } else {
                return redirect()->route('new-ad') - with($cat_id)->with('error', 'There was sth error with your input. Please check before publishing Ad.');
            }

        } else {
            if ($user->isVendor()) {
                return redirect()->route('edit-company-profile')->with('error', 'Please Update Your Company Profile First to Create Ad.');
            } else {
                return redirect()->route('my-profile')->with('error', 'Please Update Your Profile First to Create Ad.');
            }
        }

    }


    public function showEdit($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if ($post->user->id == $user->id) {
            return view('posts.edit-post', compact('post'));
        } else {
            return redirect()->route('my-ads')->with('error', 'Sorry this is not your Ad to Edit');
        }
    }

    public function UpdatePost(PostUpdateRequest $request)
    {
        $user = \Auth::user();
        if ($user->hasCompleteProfile()) {
            $post = Post::findorFail(\Crypt::decrypt($request->input('post_id')));
            if ($post->user->id != $user->id) {
                return redirect()->route('my-ads')->with('error', 'Sorry this is not your Ad to Edit');
            }
            $post->content = $request->input('content');
            $post->price = $request->input('price');
            $post->city = $user->user_profile->city;
            $post->condition = $request->input('condition');
            $post->is_negotiable = $request->input('is_negotiable');

            if ($post->save()) {
                $postid = $post->id;
                //Img uploading...
                $fileName = $post->get_meta('_featured_image');
                if (Input::hasFile('featuredimage')) {
                    if ($fileName != 'no-image.png') {
                        $path = 'uploads/';
                        \File::delete($path . $fileName);
                    }
                    $originalpath = 'uploads/original';
                    $file = Input::file('featuredimage');
                    $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
                    $fileName = str_random(6) . "_" . $name . '.' . $file->getClientOriginalExtension();
                    $file->move($originalpath, $fileName);
                    $img = 'uploads/original/' . $fileName;
                    Image::make($img)->insert('watermark.png', 'center')->save('uploads/' . $fileName);
                    $path = 'uploads/original/';
                    \File::delete($path . $fileName);
                }
                $node = \App\Category::findorFail($post->category_id);
                $realestateArray = array('_property_type' => $request->input('property_type'), '_property_location' => $request->input('property_location'), '_access_road' => $request->input('access_road'), '_land_size' => $request->input('land_size'), '_bedrooms' => $request->input('bedrooms'), '_bathroom' => $request->input('bathroom'), '_livingroom' => $request->input('livingroom'), '_water_supply' => $request->input('water_supply'), '_furnished' => $request->input('furnished'), '_features' => json_encode($request->input('features')));
                $carsArray = array('_make_year' => $request->input('make_year'), '_kilometers' => $request->input('kilometers'), '_colour' => $request->input('colour'), '_engine_cc' => $request->input('engine_cc'), '_fuel_type' => $request->input('fuel_type'), '_transmission' => $request->input('transmission'),);
                $motorcycleArray = array('_lot_no' => $request->input('lot_no'), '_zone' => $request->input('zone'), '_make_year' => $request->input('make_year'), '_kilometers' => $request->input('kilometers'), '_milage' => $request->input('milage'), '_colour' => $request->input('colour'), '_engine_cc' => $request->input('engine_cc'),);
                $DesktopArray = array('_processor' => $request->input('processor'), '_ram' => $request->input('ram'), '_graphics_card' => $request->input('graphics_card'), '_harddisk' => $request->input('harddisk'), '_moniter_desc' => $request->input('moniter_desc'), '_features' => json_encode($request->input('features')));
                $laptopArray = array('_processor' => $request->input('processor'), '_ram' => $request->input('ram'), '_graphics_card' => $request->input('graphics_card'), '_harddisk' => $request->input('harddisk'), '_screen_size' => $request->input('screen_size'), '_features' => json_encode($request->input('features')));
                $handsetArray = array('_sim_slot' => $request->input('sim_slot'), '_camera' => $request->input('camera'), '_smartphone_os' => $request->input('smartphone_os'), '_screen_size' => $request->input('screen_size'), '_cpu_core' => $request->input('cpu_core'), '_ram' => $request->input('ram'), '_internal_storage' => $request->input('internal_storage'), '_features' => json_encode($request->input('features')),);
                if ($node->parent_id == 16) {
                    \App\PostMeta::savePostMeta($post->id, $carsArray);
                }
                if ($node->parent_id == 186) {
                    \App\PostMeta::savePostMeta($post->id, $realestateArray);
                }
                if ($node->parent_id == 39) {
                    \App\PostMeta::savePostMeta($post->id, $motorcycleArray);
                }
                if ($node->id == 93) {
                    \App\PostMeta::savePostMeta($post->id, $DesktopArray);
                }
                if ($node->id == 97) {
                    \App\PostMeta::savePostMeta($post->id, $laptopArray);
                }
                if ($node->parent_id == 135) {
                    \App\PostMeta::savePostMeta($post->id, $handsetArray);
                }
                $metaArray = array('_featured_image' => $fileName, '_post_unique_id' => 'SLN' . $post->id, '_is_used_for' => $request->input('is_used_for'), '_is_home_delivary' => $request->input('home_delivary'), '_delivary_area' => $request->input('delivaryarea'), '_delivary_charges' => $request->input('delivary_charges'), '_warranty_type' => $request->input('warranty'), '_warrenty_period' => $request->input('warranty_period'), '_warranty_includes' => $request->input('warranty_includes'),);
                \App\PostMeta::savePostMeta($post->id, $metaArray);
                return \Redirect::route('add-images', ['ad_id' => $postid])->with('message', 'Ad saved correctly!!! Please Edit Gallery Images.');
            } else {
                return redirect()->back()->with('error', 'There was sth error with your input. Please check before Saving Ad.');
            }

        } else {
            if ($user->isVendor()) {
                return redirect()->route('edit-company-profile')->with('error', 'Please Update Your Company Profile First to Create Ad.');
            } else {
                return redirect()->route('my-profile')->with('error', 'Please Update Your Profile First to Create Ad.');
            }
        }
    }

    public function deletePost($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if(!$user->isAdmin()){
            if ($post->user->id == $user->id) {
                $this->deletePostGalleryImages($post->id);
                $this->deleteFeaturedImage($post->id);
                $post->delete();
                return redirect()->route('my-ads')->with('success', 'Ad Successfully Deleteted!');
            } else {
                return redirect()->route('my-ads')->with('error', 'Sorry this is not your Ad to Delete');
            }
        }else{
            $this->deletePostGalleryImages($post->id);
            $this->deleteFeaturedImage($post->id);
            $post->delete();
            return redirect()->route('my-ads')->with('success', 'Ad Successfully Deleteted!');
        }
    }

    public function deleteFeaturedImage($postid)
    {
        $post = Post::findorFail($postid);
        if ($post->get_meta('_featured_image') != 'no-image.png') {
            $path = 'uploads/';
            \File::delete($path . $post->get_meta('_featured_image'));
        }
        return true;
    }

    public function deletePostGalleryImages($postid)
    {
        $post = Post::findorFail($postid);
        $images = $post->gallery;
        if (count($images) > 0) {
            $path = 'uploads/';
            foreach ($images as $image) {
                \File::delete($path . $image['filename']);
            }
        }
        return true;
    }

    public function markAsSold($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if(!$user->isAdmin()){
            if ($post && $post->user->id == $user->id) {
                $post->status = 'sold';
                $post->save();
                return redirect()->route('my-ads')->with('success', 'Ad Marked as Sold!');
            } else {
                return Response::view('errors.404');
            }
        }else{
            $post->status = 'sold';
            $post->save();
            return redirect()->route('my-ads')->with('success', 'Ad Marked as Sold!');
        }

    }

    public function MarkAsPublished($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if(!$user->isAdmin()){
            if ($post && $post->user->id == $user->id) {
                $post->status = 'publish';
                $post->save();
                return redirect()->route('my-ads')->with('success', 'Ad Marked as Published!');
            } else {
                return redirect()->route('my-ads')->with('error', 'Sorry this ad cant be marked as Published.');
            }
        }else{
            $post->status = 'publish';
            $post->save();
            return redirect()->route('my-ads')->with('success', 'Ad Marked as Published!');
        }
    }
    public function MarkAsFeatured($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if($user->isAdmin()){
            $post->is_featured = 1;
            $post->save();
            return redirect()->route('my-ads')->with('success', 'Ad Marked as Featured!');
        }else{
            return Response::view('errors.404');
        }
    }
    public function MarkAsNotFeatured($postid)
    {
        $user = \Auth::user();
        $post = Post::findorFail($postid);
        if($user->isAdmin()){
            $post->is_featured = 0;
            $post->save();
            return redirect()->route('my-ads')->with('success', 'Ad Removed from Featured!');
        }else{
            return Response::view('errors.404');
        }
    }
}
