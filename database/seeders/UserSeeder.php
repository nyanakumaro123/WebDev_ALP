<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => 'admin'
        ]);

        User::create([
            'username' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin456'),
            'status' => 'admin'
        ]);
    }
}
