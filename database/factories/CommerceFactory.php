<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commerce;
use Faker\Generator as Faker;

$factory->define(Commerce::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [       
        'nombre' => $title,
        'slug' 			=>Str::slug($title),
        'descripcion' => $faker->text(50),
        'hora_apertura' => $faker->time(),
        'hora_cierre' => $faker->time(),
        'num_telefono' => $faker->phoneNumber (),
        'email' => $faker->email(),
        //'ubicacion_id' => rand(1,50),
        'file' => 'https://www.instagram.com/p/B5aYvlqJ-IQ/?utm_source=ig_web_copy_link',
      ];
});
