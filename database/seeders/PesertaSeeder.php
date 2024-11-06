<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peserta;
use Spatie\Permission\Models\Role;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data peserta pertama
        $p1 = Peserta::create([
            'peserta_nama' => 'Budi Santoso',
            'peserta_gender' => 'Laki-laki',
            'peserta_tanggallahir' => '1990-05-12',
            'peserta_pendidikan' => 'SMA',
            'peserta_email' => 'budi@mail.com',
            'peserta_telepon' => '08123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Membuat data peserta kedua
        $p2 = Peserta::create([
            'peserta_nama' => 'Siti Aminah',
            'peserta_gender' => 'Perempuan',
            'peserta_tanggallahir' => '1995-08-21',
            'peserta_pendidikan' => 'PT',
            'peserta_email' => 'siti@mail.com',
            'peserta_telepon' => '08223456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
