<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan UserSeeder untuk membuat Admin secara spesifik
        $this->call([
            UserSeeder::class,
        ]);

        // 2. Jika ingin membuat user tambahan, pastikan factory sudah memiliki kolom 'status'
        // \App\Models\User::factory(10)->create();
    }
}
