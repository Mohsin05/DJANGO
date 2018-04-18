<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //


    public function posts(){

        //it will use two tables, first the app\Post and second is the app\User, from the app\User it will
        // get the country_id
        return $this->hasManyThrough('App\Post','App\User');

    }

}
