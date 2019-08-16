<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'author_id'=> $faker->numberBetween(1,5),
        'title'  =>$faker->sentence(2),
        'isbn'=>$faker->isbn13,
        'year'=>$faker->year,
        'edition'=> $faker->randomElement(['1st','2nd','3rd']),
        'description'=> implode(' ', $faker->words(7))

    ];
});
