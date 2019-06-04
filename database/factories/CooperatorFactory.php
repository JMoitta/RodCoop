<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cooperator;
use Faker\Generator as Faker;

$factory->define(Cooperator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
