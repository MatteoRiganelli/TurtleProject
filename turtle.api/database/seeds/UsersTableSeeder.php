<?php

use App\User;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user1 = [
            'id' => '0',
            'name' => 'Matteo Riganelli',
            'email' => 'matteoriganelli@gmail.com',
            'password' => Hash::make('123456'),
            'active' => '1'
        ];

        User::create($user1);
    }
}
