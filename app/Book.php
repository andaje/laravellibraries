<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'edition', 'year', 'author_id', 'photo_id', 'description'];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function barcode(){
        return $this->hasMany('App\Barcode');
    }

    public function rentCount()
    {
        return $this->hasManyThrough('App\Rent', 'App\Barcode', 'book_id', 'barcode_id')
            ->where('return_date', '=', null);
    }

    public function rents()
    {
        return $this->hasManyThrough('App\Rent', 'App\Barcode', 'book_id', 'barcode_id')
            ->where('return_date', '!=', null);
    }
}

