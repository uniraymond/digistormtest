<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address_type' => $faker->randomElement(['home', 'postal', 'company', 'office', 'school']),
        'address' => $faker->address,
        'region' => $faker->state,
        'suburb' => $faker->state,
        'state' => $faker->state,
        'postcode' => $faker->postcode,
        'country' => $faker->country,
    ];
});
