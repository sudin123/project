<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Image;
use Validator;
use Response;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showGalleryImagesInstantly(){
        $postid = $_REQUEST['postid'];
        $post = Post::findorfail($postid);
        if($post && $post->user->id == \Auth::user()->id) {
            $media = $post->gallery;
            $returnHTML = view('posts.imagesajax', ['media' => $media])->render(); // or method that you prefere to return data + RENDER is the key here
            return response()->json(array('status' => 'success', 'html' => $returnHTML, 'count'=>count($media)));
        }else {
            return array('status' => 'error');
        }
    }

    public function uploadGalleryImages($post_id)
    {
        $postid = $post_id;
        if (!empty($postid) && Post::findOrfail($postid)->user->id == \Auth::user()->id) {
            $post = Post::findorfail($postid);
            $media = $post->gallery;
            return view('posts.uploadimages', compact('postid', 'media'));
        }
        return Response::view('errors.404');
    }

    public function UploadImages()
    {
        $postid = $_REQUEST['postid'];
        $post = Post::findorfail($postid);
        if($post->user->id == \Auth::user()->id){
            $media = $post->gallery;
            if (count($media) >= 6) {
                return Response::make(['You can only upload 6 Images. If you want to upload Other image Please Delete images Listed for this ad.'], 400);
            }
            $input = Input::all();
            $rules = array(
                'file' => 'image',
            );
            $validation = Validator::make($input, $rules);
            if ($validation->fails()) {
                return Response::make(['Invalid Image!'], 400);
            }
            $originalpath = 'uploads/original';
            $file = Input::file('file');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $fileName = str_random(6) . "_" . $name . '.' . $file->getClientOriginalExtension();
            $file->move($originalpath,$fileName);
            $img = 'uploads/original/'. $fileName;
            $upload_success = Image::make($img)
                ->insert('watermark.png', 'center')
                ->save('uploads/' . $fileName);
            $path = 'uploads/original/';
            \File::delete($path . $fileName);
            if ($upload_success) {
                // open an image file
                $media = new Gallery();
                $media->filename = $fileName;
                $media->post_id = $postid;
                $media->save();
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);
            }
        }else{
            return Response::json('error', 400);
        }

    }

    public function deleteImages($imageid)
    {
        $media = Gallery::findorFail($imageid);
        $filename = $media->filename;
        $path = 'uploads/';
        if (\File::delete($path . $filename)) {
            $media->delete();
            return redirect()->back()->with('success', 'Image Deleted!');
        } else {
            return redirect()->back()->with('error', 'Cannot Delete Image, Please Try again.');
        }
    }

}
