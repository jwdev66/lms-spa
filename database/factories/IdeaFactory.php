<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Idea\Idea;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'title' => $faker->word,
        'description' => $faker->text,
        'type' => $faker->randomElement(['Sun', 'Mon', 'Tue']),
        'slug' => $faker->text,
        'categories' => $faker->randomElement(['Sun', 'Mon', 'Tue']),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
