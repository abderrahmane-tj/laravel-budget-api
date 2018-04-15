<?php

use App\Models\Budget;
use Faker\Generator as Faker;

/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(Budget::class, function (Faker $faker) {
    $month = Carbon\Carbon::instance($faker->dateTimeThisYear())->format('mY');
    return [
        'note' => random_int(0, 100) < 35 ? $faker->sentence : null,
        'amount' => $faker->randomFloat(2, 1, 2000),
        'month' => intval($month),
    ];
});