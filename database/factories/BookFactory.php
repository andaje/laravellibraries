<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->ra,
        'author_id',
        'isbn',
        'edition',
        'year',
        'photo_id',

    ];
});
