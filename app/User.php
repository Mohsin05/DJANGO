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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function post(){

        return $this->hasOne('App\Post'); // it will automatically look for the user_id and fetch the information related to it.

    }

    public function posts(){

    return $this->hasMany('App\Post');

    }

    public function roles(){

        //when the execution reach here, the laravel will find the role based on the user_id
        //and it will match with the role_id

        //return $this->belongsToMany('App\Role');

        //to get the pivot table from the data base.
        //use the following command

        return $this->belongsToMany('App\Role')->withPivot('created_at');

    }


    public function photos(){

        return $this->morphMany('App\Photo','imageable');


    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

}
