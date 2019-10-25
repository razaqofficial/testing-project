<?php

use App\User;
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
        User::create([
            'name' => 'Dummy User',
            'email' => 'dummyuser123@example.com',
            'password' => bcrypt('dummyuser123')
        ]);

        User::create([
            'name' => 'Avatar',
            'email' => 'avatar123@example.com',
            'password' => bcrypt('avatar123')
        ]);

        User::create([
            'name' => 'Avatar',
            'email' => 'avatar123@example.com',
            'password' => bcrypt('avatar123')
        ]);
    }
}
