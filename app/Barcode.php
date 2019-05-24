<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    //
    protected $fillable = ['book_id', 'book_item'];
    //protected $appends = ['bookitem'];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function rent()
    {
        return $this->hasMany('App\Rent');
    }

   /* public function getBookitemAttribute() {

        return $this->book->isbn . $this->id;


   }*/



}
