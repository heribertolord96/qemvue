<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promotion;
use Faker\Generator as Faker;

$factory->define(Promotion::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'name' => $title,
        'slug' 			=> Str::slug($title),
        'body' => $faker->text(50),
        'fecha_inicio' => $faker->dateTime(), 
        'fecha_fin' => $faker->dateTime(),
        'commerce_id' => rand(1,10),
        //'hora_apertura' => $faker->time(),
        'file' => 'http://storeblog.test/images/atrr.png',
    ];
});
