<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Role::class)->states('admin')->create();
        factory(\App\Role::class)->states('investigator')->create();
    }
}
