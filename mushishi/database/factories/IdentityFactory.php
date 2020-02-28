<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IdentityCard;
use Faker\Generator as Faker;
$factory->define(IdentityCard::class, function (Faker $faker) {
    return [
        'city' => $faker->city,
        'user_id' => rand(1, 100),
    ];
});
