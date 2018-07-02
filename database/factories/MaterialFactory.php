<?php

use Faker\Generator as Faker;

$factory->define(\App\Material::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'code' => $faker->userName,
        'price' => $faker->randomFloat(1, 1, 1000),
        'quantity' => $faker->randomDigit
    ];
});
