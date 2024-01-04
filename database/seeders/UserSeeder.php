<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Wisnu',
                'email' => 'wisnu@gmail.com',
                'phone' => '87819729731',
                'type' => 'user',
                'region' => 'surabaya',
                'income_start' => 100000,
                'rating' => 5,
                'password' => '$2y$10$UmbVVIFiR8y3qCXm4bUhS.fAi6Vk0JiG5wGqlDx0J6HDSvshiKjB2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'type' => $user['type'],
                'region' => $user['region'],
                'income_start' => $user['income_start'],
                'rating' => $user['rating'],
                'password' => $user['password'],
                'created_at' => $user['created_at'],
                'updated_at' => $user['updated_at'],
            ]);
        }
    }
}
