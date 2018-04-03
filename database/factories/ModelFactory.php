<?php

use App\Models\Account\User;
use App\Models\Transactions\Account;
use App\Models\Transactions\Budget;
use App\Models\Transactions\Category;
use App\Models\Transactions\Payee;
use App\Models\Transactions\Transaction;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * @var $factory \Illuminate\Database\Eloquent\Factory
 */
$factory->define(User::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        // secret
      'remember_token' => str_random(10),
    ];
});

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

$factory->define(Category::class, function (Faker $faker) {
    return [
      'name' => $faker->words(2),
      'note' => random_int(0, 100) < 35 ? $faker->sentence : null
    ];
});

$factory->define(Payee::class, function (Faker $faker) {
    return [
      'name' => $faker->company,
    ];
});

$factory->define(Budget::class, function (Faker $faker) {
    $month = Carbon\Carbon::instance($faker->dateTimeThisYear())->format('mY');
    return [
      'note' => random_int(0, 100) < 35 ? $faker->sentence : null,
      'amount' => $faker->randomFloat(2, 1, 2000),
      'month' => intval($month),
    ];
});

$factory->define(Transaction::class, function (Faker $faker) {
    return [
      'done_at' => $faker->dateTimeThisYear(),
      'note' => random_int(0, 100) < 35 ? $faker->sentence : null,
      'amount' => $faker->randomFloat(2, 1, 500),
      'checked' => random_int(0, 100) < 85 ? 1 : 0,
    ];
});
