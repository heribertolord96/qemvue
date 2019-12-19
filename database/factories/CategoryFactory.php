<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'name' => $title,
        'slug'=> Str::slug($title),
        'department_id'=> $faker->unique()->randomDigit,
        //'codigo' => $faker->postcode(),
        'body' => $faker->text(50),
        //'file' => 'http://storeblog.test/images/atrr.png'

    ];
});
