<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Baum\Node as Baum;
class Category extends Baum
{
    protected $fillable = ['slug', 'name', 'description', 'parent_id'];

    public function articles()
    {
        return $this->hasMany('App\Post');
    }

}
