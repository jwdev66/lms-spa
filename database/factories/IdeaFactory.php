<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Idea::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->text(120),
    ];
});
