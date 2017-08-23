<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function AuthorAds()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function get_profile($toGet)
    {
        $profiles = $this->user_profile;
        foreach ($profiles as $profile) {
            return $profile->$toGet;
        }
        return false;

    }

    public function accountIsActive($code)
    {
        if( !$code)
        {
           return false;
        }
        $user = User::whereActivationCode($code)->firstOrFail();
        if (!$user) {
            return false;
        }
        $user->active = 1;
        // CLEAR THE ACTIVATION CODE
        $user->activation_code = null;
        if ($user->save()) {
            return true;
        }
    }

    public function active()
    {
        if ($this->whereActive == true) {
            return true;
        } else {
            return false;
        }
    }

    //USER ROLES
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user')->withTimestamps();
    }

    public function hasRole($name)
    {
        //dd($this->roles);
        foreach ($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }
        return false;
    }

    public function scopeIsRole($query, $role)
    {
        return $query->whereHas('roles', function($q) use($role) {
            $q->where('name', $role);
        });
    }
    public function isBuyer()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'buyer')
            {
                return true;
            }
        }

        return false;
    }
    public function isSeller()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'seller')
            {
                return true;
            }
        }

        return false;
    }
    public function isVendor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'vendor')
            {
                return true;
            }
        }

        return false;
    }
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'administrator')
            {
                return true;
            }
        }

        return false;
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }


    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    // SOCIAL MEDIA AUTH
    public function social()
    {
        return $this->hasMany('App\Social');
    }

    public function Profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function watchlist()
    {
        return $this->hasMany('App\Watchlist', 'user_id');
    }

    public function getRole($id){
        if($id == 1){
            return true;
        }
        return false;

    }

    public function hasCompleteProfile(){
        if($this->isVendor()){
            if($this->profile->company_name != '' && $this->profile->area != '' && $this->profile->city!= '' && $this->profile->phone !=''){
                return true;
            }
            return false;
        }
        if($this->firstname != '' && $this->lastname != '' && $this->profile->area != '' && $this->profile->city!= '' && $this->profile->phone !=''){
            return true;
        }
        return false;
    }
}
