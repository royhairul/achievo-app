<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'peserta1',
                'password' => Hash::make('password123'), // Anda bisa mengganti dengan password yang lebih kuat
                'rule' => 'peserta',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'penyelenggara1',
                'password' => Hash::make('password123'),
                'rule' => 'penyelenggara',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'peserta2',
                'password' => Hash::make('password123'),
                'rule' => 'peserta',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'penyelenggara2',
                'password' => Hash::make('password123'),
                'rule' => 'penyelenggara',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        User::insert($users);
    }
}
