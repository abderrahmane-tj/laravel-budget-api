<?php

use App\Models\Account;
use Faker\Generator as Faker;

/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(Account::class, function (Faker $faker) {
    $names = ['Cash', 'Bank', 'Wallet', 'Her wallet'];
    $type = random_int(0, count($names) - 1);
    return [
        'name' => $names[$type],
        'type' => $type,
        'off_budget' => 0,
        'balance' => $faker->randomNumber(5)
    ];
});