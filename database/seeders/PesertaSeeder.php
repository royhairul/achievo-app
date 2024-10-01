<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peserta;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peserta = [
            [
                'peserta_nama' => 'Budi Santoso',
                'peserta_gender' => 'Laki-laki',
                'peserta_tanggallahir' => '1990-05-12',
                'peserta_pendidikan' => 'Sarjana',
                'peserta_email' => 'budi@mail.com',
                'peserta_telepon' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'peserta_nama' => 'Siti Aminah',
                'peserta_gender' => 'Perempuan',
                'peserta_tanggallahir' => '1995-08-21',
                'peserta_pendidikan' => 'Diploma',
                'peserta_email' => 'siti@mail.com',
                'peserta_telepon' => '08223456789',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Masukkan data ke dalam tabel tb_peserta
        Peserta::insert($peserta);
    }
}
