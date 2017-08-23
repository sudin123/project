<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function articles(){
        $this->hasOne('App\Post');
    }
}
