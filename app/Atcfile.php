<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atcfile extends Model
{
    public function posts() {
        return $this->belongsToMany('App\Post', 'atcfile_post');
    }
}
