<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'author_id'=> $faker->randomNumber(2),
        'title' => implode(' ', $faker->words(3)),
        'isbn'=> implode(' ', $faker->words(3)),
        'edition'=> implode(' ', $faker->words(3)),
        'year'=> 1999,
        'photo_id'=> $faker->randomNumber(2),
        'description'=> implode(' ', $faker->words(10))

    ];
});
