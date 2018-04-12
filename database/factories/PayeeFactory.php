<?php

use App\Models\Payee;
use Faker\Generator as Faker;

/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(Payee::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});