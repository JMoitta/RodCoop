<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PrayingHouse;
use Faker\Generator as Faker;

$factory->define(PrayingHouse::class, function (Faker $faker) {
    $data = [
        'locality' => $faker->secondaryAddress,
        'address' => $faker->address,
    ];
    return $data;
});
