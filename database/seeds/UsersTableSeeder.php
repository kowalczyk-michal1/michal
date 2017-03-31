<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "User 1";
        $user->email = "user@example.com";
        $user->password = bcrypt('user1');
        $user->save();

        $user->roles()->attach(2);
    }
}
