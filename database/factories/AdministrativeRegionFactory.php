<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\AdministrativeRegion;
use Faker\Generator as Faker;

$factory->define(AdministrativeRegion::class, function (Faker $faker) {
    return [
        'description' => 'Região adminstrativa - ',
    ];
});
