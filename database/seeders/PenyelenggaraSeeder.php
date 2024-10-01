<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyelenggara;

class PenyelenggaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data penyelenggara yang akan diinsert
        $penyelenggara = [
            [
                'penyelenggara_nama' => 'Event Organizer X',
                'penyelenggara_alamat' => 'Jl. Merdeka No. 10',
                'penyelenggara_tahunberdiri' => '2010-05-12',
                'penyelenggara_bidang' => 'Event Organizer',
                'penyelenggara_email' => 'contact@eo-x.com',
                'penyelenggara_telepon' => '08123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penyelenggara_nama' => 'Kompetisi ABC',
                'penyelenggara_alamat' => 'Jl. Sudirman No. 23',
                'penyelenggara_tahunberdiri' => '2015-08-21',
                'penyelenggara_bidang' => 'Kompetisi Sains',
                'penyelenggara_email' => 'info@kompetisiabc.com',
                'penyelenggara_telepon' => '08223456789',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Masukkan data ke dalam tabel tb_penyelenggara
        Penyelenggara::insert($penyelenggara);
    }
}
