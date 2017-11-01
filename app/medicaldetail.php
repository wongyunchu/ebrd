<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicaldetail extends Model
{
    protected $guarded = array();
    public function medical() {
        return $this->belongsTo('App\medical');
    }
}
