<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = ['user_id','barcode_id','rental_start','return', 'max_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function barcode()
    {
        return $this->belongsTo('App\Barcode');
    }
}
