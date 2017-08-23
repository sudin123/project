<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $table = 'watchlists';
    protected $fillable = [
        'user_id', 'post_id',
    ];
}
