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
    } else {
        $data['saturday'] = false;
    }
    if(rand(1, 2) == 1){
        $data['sunday'] = true;
    } else {
        $data['sunday'] = false;
    }
    if(!$data['sunday'] && !$data['saturday']){
        if(rand(1, 2) == 1){
            $data['sunday'] = true;
        } else {
            $data['saturday'] = true;
        }
    }
    return $data;
});
