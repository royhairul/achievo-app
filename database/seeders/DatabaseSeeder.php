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
        // Seeder Role and Permission
        $this->call(RolePermissionSeeder::class);

        $this->call(PesertaSeeder::class);
        $this->call(PenyelenggaraSeeder::class);
        $this->call(UserSeeder::class); // UserSeeder harus dibawah Seeder Peserta dan Penyelenggara
    }
}
