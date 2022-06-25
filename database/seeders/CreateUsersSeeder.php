<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'foto' => 'http://lorempixel.com/400/200/sports/',
                'password' => Hash::make('admin123'),
                'role_id' => '1',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'foto' => 'https://images3.alphacoders.com/823/thumb-1920-82317.jpg',
                'password' => Hash::make('users123'),
                'role_id' => '2'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
