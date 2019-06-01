<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\AdministrativeRegion;
use Faker\Generator as Faker;

$factory->define(AdministrativeRegion::class, function (Faker $faker) {
    return [
        'description' => 'Região adminstrativa - ',
    ];
});
