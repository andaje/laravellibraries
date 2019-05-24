<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    protected $fillable = ['rental_date', 'return_date', 'barcode_id', 'user_id'];

  //  protected $dates = ['rental_date','return_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function barcode()
    {
        return $this->belongsTo('App\Barcode');
    }



}
