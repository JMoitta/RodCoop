<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\PrayingHouse;
use Faker\Generator as Faker;

$factory->define(PrayingHouse::class, function (Faker $faker) {
    $data = [
        'locality' => $faker->secondaryAddress,
        'address' => $faker->address,
    ];
    if(rand(1, 2) == 1){
        $data['saturday'] = true;
        $data['saturdayHours'] = Carbon\Carbon::createFromTime(19, 30);
    } else {
        $data['saturday'] = false;
    }
    if(rand(1, 2) == 1){
        $data['sunday'] = true;
        $data['sundayHours'] = Carbon\Carbon::createFromTime(19, 30);
    } else {
        $data['sunday'] = false;
    }
    return $data;
});
