<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ad;
use Faker\Generator as Faker;

$factory->define(Ad::class, function (Faker $faker) {
    $title = $faker->sentence(4);
        return [
        
            'nombre' => $title,
            'slug' 			=> Str::slug($title),
            'descripcion' 		=> $faker->text(200),
            'inicio_vigencia' 			=> $faker->dateTime(),
            'fin_vigencia' 		=> $faker->dateTime(),
            'file' 			=> $faker->imageUrl($width = 1200, $height = 400),
        
    ];
});
