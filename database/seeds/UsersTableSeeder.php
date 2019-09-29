<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'qazplm123',
        ];
        App\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->ideas()->save(factory(App\Models\Idea\Idea::class)->make());
        // });
    }
}
