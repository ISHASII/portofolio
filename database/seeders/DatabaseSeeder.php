<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil AdminUserSeeder
        $this->call(AdminUserSeeder::class);

        // Seeder lainnya (misalnya user biasa)
        // $this->call(AnotherSeeder::class);
    }
}