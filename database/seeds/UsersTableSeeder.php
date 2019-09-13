<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)
           ->create()
           ->each(function ($u) {
               $adminRole = App\Role::where('name', 'admin')->first();
               $u->roles()->save($adminRole);
           });

        factory(App\User::class, 3)
            ->create()
            ->each(function ($u) {
                $investigatorRole = App\Role::where('name', 'investigator')->first();
                $u->roles()->save($investigatorRole);
            });

        DB::table('users')->insert([
            'name'     => Str::random(10),
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('qazplm123'),
        ]);
        $user = App\User::where('email', 'admin@gmail.com')->first();
        $role = App\Role::where('name', 'investigator')->first();
        $user->roles()->save($role);
    }
}
