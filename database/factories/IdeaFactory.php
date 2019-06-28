<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Idea::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->paragraph(1),
        'user_id' => function () {
            $user = factory(App\User::class)->create();
            $role = App\Role::where('name', 'investigator')->first();
            $user->roles()->save($role);

            return $user->id;
        }
    ];
});
