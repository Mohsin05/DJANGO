<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use SoftDeletes;
//    protected $table = 'posts';
//    protected $primaryKey = 'id_post';

protected $dates = ['deleted_at'];

protected  $fillable = [
    'body',
    'content',
    'title',
    'path'
];


public function user(){


    return $this->belongsTo('App\User');

}

public function photos(){

    return $this->morphMany('App\Photo','imageable');


}

public function tags(){

 return $this->morphToMany('App\tag', 'taggable');

}

public $directory = "/images/";

public function getPathAttribute($value){

 return  $this->directory.$value;

}





}
