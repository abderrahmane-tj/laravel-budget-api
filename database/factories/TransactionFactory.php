<?php

use App\Models\Transaction;
use Faker\Generator as Faker;

/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'done_at' => $faker->dateTimeThisYear(),
        'note' => random_int(0, 100) < 35 ? $faker->sentence : null,
        'amount' => $faker->randomFloat(2, 1, 500),
        'checked' => random_int(0, 100) < 85 ? 1 : 0,
    ];
});