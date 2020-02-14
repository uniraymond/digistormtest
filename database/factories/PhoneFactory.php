<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'phone_type' => $faker->randomElement(['mobile', 'homephone', 'work', 'school', 'tax']),
        'phone_number' => $faker->phoneNumber,
    ];
});
