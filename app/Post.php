<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Intervention\Image\Image as Image;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['slug', 'title', 'content', 'excerpt', 'user_id', 'category_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function setCreatedAtAttribute($date)
    {
        if (is_string($date)) {
            $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
        } else {
            $this->attributes['created_at'] = $date;
        }
    }

    public function setSlugAttribute($data)
    {
        $this->attributes['slug'] = str_slug($data);
    }

    public function scopeFindBySlug($query, $slug)
    {
        return $query->whereSlug($slug)->firstOrFail();
    }

    public function post_meta()
    {
        return $this->hasMany('App\PostMeta', 'post_id');
    }

    public function get_meta($meta_key)
    {
        foreach ($this->post_meta as $meta) {
            if ($meta->meta_key == $meta_key) return $meta->meta_value;
        }
        return false;
    }

    public function gallery()
    {
        return $this->hasMany('App\Gallery', 'post_id');
    }
}
