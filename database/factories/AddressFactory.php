<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        //
        'street' => $faker ->streetName,
        'number'=>$faker->randomDigitNotNull,
        'bus'=>$faker->randomDigitNotNull,
        'city' => $faker ->city,
        'postal_code'=>$faker->postcode,
        'country'=> 'Belgium'

    ];
});
