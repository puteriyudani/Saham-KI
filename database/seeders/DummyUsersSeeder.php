<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345'),
            ],
            [
                'name' => 'Khairi',
                'email' => 'khairi@gmail.com',
                'role' => 'pemegang_saham',
                'password' => bcrypt('12345'),
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
