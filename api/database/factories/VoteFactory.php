<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'type' => ['UPVOTE', 'DOWNVOTE'][random_int(0, 1)]
    ];
});
