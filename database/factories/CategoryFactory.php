<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'name' => $title,
        'slug'=> Str::slug($title),
        'department_id'=> rand(1,28),
        //'codigo' => $faker->postcode(),
        'body' => $faker->text(50),
        //'file' => 'http://storeblog.test/images/atrr.png'

    ];
});
