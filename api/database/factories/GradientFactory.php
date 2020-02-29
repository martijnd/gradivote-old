<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gradient;
use App\User;
use Faker\Generator as Faker;

$factory->define(Gradient::class, function (Faker $faker) {
    return [
        'rule' => "linear-gradient({$faker->numberBetween(0, 360)}deg, {$faker->hexColor}, {$faker->hexColor} 100%);",
        'user_id' => User::find(1)->id
    ];
});
