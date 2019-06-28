<?php

use App\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->state(App\Role::class, 'admin', [
    'name' => 'admin',
    'description' => 'Administrator',
]);

$factory->state(App\Role::class, 'investigator', [
    'name' => 'investigator',
    'description' => 'Investigator'
]);

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => 'investigator',
        'description' => 'Investigator'
    ];
});
