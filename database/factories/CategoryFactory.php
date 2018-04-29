<?php

use App\Models\Category;
use Faker\Generator as Faker;
/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'note' => random_int(0, 100) < 35 ? $faker->sentence : null
    ];
});