<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    $title = $faker->sentence(4)->rand(1,1000);
    return [
        'name' => $title,
        'slug' 			=> $title,
        'commerce_id'=> $faker->unique()->randomDigit,
        'codigo' => $faker->barcode(),   
        'body' => $faker->text(50),
        'file' => 'http://storeblog.test/images/atrr.png',

    ];
});
