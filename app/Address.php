<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = ['street', 'city_id'];


    public function user()
    {
        // user relationship
        return $this->hasMany('App\User');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
