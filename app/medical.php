<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medical extends Model
{
    protected $guarded = array();

    public function medicaldetail(){
        return $this->hasMany('App\medicaldetail');
    }
}
