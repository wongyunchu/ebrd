<?php

namespace App;
use App\Atcfile;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Post
 *
 * @mixin \Eloquent
 */
class  Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function atcfiles(){
        return $this->hasMany('App\Atcfile');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }


    public static $rules = [
        'title'=>'required',
        'body'=>'required'
    ];

    protected $fillable = ['title', 'body', 'thumbnail'];
}
