<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommerceRole;
use Faker\Generator as Faker;

$factory->define(CommerceRole::class, function (Faker $faker) {
    return [
        'role_id' => rand(1,4),
        'commerce_id' => rand(1,10)
    ];
});
