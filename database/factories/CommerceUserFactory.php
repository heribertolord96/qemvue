<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommerceUser;
use Faker\Generator as Faker;

$factory->define(CommerceUser::class, function (Faker $faker) {
    return [
        'commerce_id' => rand(1,10),
        'user_id' => rand(1,2)
    ];
                   
});
