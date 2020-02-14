<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'dob' => $faker->date(),
        'company' => $faker->company,
        'position' => $faker->jobTitle,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'region' => $faker->state,
        'suburb' => $faker->state,
        'state' => $faker->state,
        'postcode' => $faker->postcode,
        'country' => $faker->country,
    ];
});
