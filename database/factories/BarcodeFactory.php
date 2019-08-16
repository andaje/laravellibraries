<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Barcode;
use Faker\Generator as Faker;

$factory->define(App\Barcode::class, function (Faker $faker) {
    return [
        'book_id'=>$faker->randomElement(App\Book::pluck('id')),
        'book_item'=>$faker->ean13,

    ];
});
