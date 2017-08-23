<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $table = 'post_meta';
    protected $fillable = array('post_id', 'meta_key', 'meta_value');
    public $timestamps = false;


    public static function initPostMeta($post_id, $metaArray)
    {
        $metas = [];
        foreach ($metaArray as $meta_key => $meta_value) {
            $metas[] = ['post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value];
        }
        return self::insert($metas);
    }
    public static function savePostMeta($post_id, $metaArray){
        foreach ($metaArray as $meta_key => $meta_value) {
            $meta = \App\PostMeta::where('post_id', $post_id)->where('meta_key',$meta_key)->get();
            if($meta){
                $meta[0]->meta_value = $meta_value;
                $meta[0]->save();
            }else{
                $meta = ['post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value];
                self::insert($meta);
            }
        }
        return true;
    }

}
