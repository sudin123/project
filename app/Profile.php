<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id','company_name','company_logo', 'website','phone','telephone','fax','street', 'area', 'city','country','show_phone','show_email','verified_phone'];
    public $timestamps = false;

    public function getCity(){
        return $this->belongsTo('App\City');
    }
}
