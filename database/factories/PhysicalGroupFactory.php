<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PhysicalGroup;
use Faker\Generator as Faker;

$factory->define(PhysicalGroup::class, function (Faker $faker) {
    return [
        'physical_name' => $faker->physical_name,
    ];
});
