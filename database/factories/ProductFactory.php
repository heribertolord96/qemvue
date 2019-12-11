<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'category_id' 		=> rand(1,20),
       // 'department_id' 	=> rand(1,50),
        //'commerce_id' 	=> rand(1,50),
        'name' 			=> $title,
        'slug' 			=> Str::slug($title),
        'descripcion' 		=> $faker->text(100),
        'presentacion' 			=> $faker->word,
        'file' 			=> $faker->imageUrl($width = 1200, $height = 400),
        'precio_venta'        => rand(0.25,3000),
    ];
});
