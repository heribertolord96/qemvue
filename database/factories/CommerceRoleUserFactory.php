<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CommerceRoleUser;
use Faker\Generator as Faker;

$factory->define(CommerceRoleUser::class, function (Faker $faker) {
    return [
        'commerce_role_id' => rand(1,4),
        'commerce_user_id' => rand(1,2)
    ];
});
