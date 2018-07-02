<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'customer' => $faker->name,
        'description' => $faker->paragraphs,
    ];
});
