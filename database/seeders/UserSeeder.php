<?php

namespace Database\Seeders;

use App\Models\Penyelenggara;
use App\Models\Peserta;
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
        // Ambil semua peserta dan penyelenggara
        $dataPeserta = Peserta::all();
        $dataPenyelenggara = Penyelenggara::all();

        foreach ($dataPeserta as $peserta) {
            User::create([
                'username' => strtolower(str_replace(' ', '_', $peserta->peserta_nama)), // Misalnya: "budi_santoso"
                'password' => 'password123',
                'rule' => 'peserta',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $peserta->peserta_id, // Mengaitkan dengan ID peserta
            ])->assignRole('peserta');
        }

        foreach ($dataPenyelenggara as $penyelenggara) {
            User::create([
                'username' => strtolower(str_replace(' ', '_', $penyelenggara->penyelenggara_nama)), // Misalnya: "event_organizer_x"
                'password' => 'password123',
                'rule' => 'penyelenggara',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => $penyelenggara->penyelenggara_id, // Mengaitkan dengan ID penyelenggara
            ])->assignRole('penyelenggara');
        }
    }
}
