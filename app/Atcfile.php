<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atcfile extends Model
{
    public function posts() {
        return $this->belongsTo('App\Post');
    }
}
