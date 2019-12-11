<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'name' => $title,
        'slug' 			=> Str::slug($title),
        'body' => $faker->text(50),
        'fecha_inicio' => $faker->dateTime(), 
        'fecha_fin' => $faker->dateTime(),
        //'hora_apertura' => $faker->time(),
        'file' => 'http://storeblog.test/images/atrr.png',
    ];
});
