<?php

namespace Database\Seeders;

use App\Models\FormLomba;
use App\Models\Penyelenggara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lomba;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data Lomba 1
        $lomba1 = Lomba::create([
            'lomba_nama' => 'Lomba Catur Nasional',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Sains',
            'lomba_tanggal' => '2024-01-28', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'Catur Center Jakarta',
            'lomba_kapasitas' => 150,
            'lomba_deskripsi' => 'Kompetisi nasional di bidang sains yang mempertemukan siswa-siswa terbaik dari seluruh Indonesia. Dalam lomba ini, peserta akan diuji kemampuan sains mereka melalui berbagai jenis soal yang menantang dan mengasah kreativitas serta logika. Lomba ini bertujuan untuk mengembangkan minat dan bakat siswa dalam bidang sains serta mempersiapkan mereka menghadapi tantangan global di masa depan.',
            'lomba_poster' => 'https://drive.google.com/file/d/1hWjB3OXuAZbtLU7xpxPGpv6ZkeigeNId/view?usp=sharing',
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba1->lomba_id,  // Menggunakan Lomba ID yang baru
            'form_content' => json_encode([
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Nama Lengkap",
                    "className" => "form-control",
                    "name" => "text-1735610854894-0",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Email",
                    "className" => "form-control",
                    "name" => "text-1735610934976-0",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "textarea",
                    "required" => true,
                    "label" => "Nomor Telepon",
                    "className" => "form-control",
                    "name" => "textarea-1735610978975-0",
                    "access" => false,
                    "subtype" => "textarea"
                ],
                [
                    "type" => "number",
                    "required" => false,
                    "label" => "Usia",
                    "className" => "form-control",
                    "name" => "number-1735610905092-0",
                    "access" => false,
                    "subtype" => "number",
                    "min" => 5,
                    "max" => 12
                ]
            ])
        ]);

        // Lomba Bernyanyi se-SMA
        $lomba2 = Lomba::create([
            'lomba_nama' => 'Lomba Band se-SMA',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Seni',
            'lomba_tanggal' => '2024-02-15', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'SMA Negeri 1 Jakarta',
            'lomba_kapasitas' => 100,
            'lomba_deskripsi' => 'Lomba band tingkat SMA yang menguji kemampuan vokal dan ekspresi peserta dalam menyanyikan lagu pilihan.',
            'lomba_poster' => 'https://drive.google.com/file/d/1U0eitknAIfaXRcDHK1kl83G7OYnnpKDo/view?usp=sharing',
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba2->lomba_id,  // Menggunakan Lomba ID yang baru
            'form_content' => json_encode([
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Nama Lengkap",
                    "className" => "form-control",
                    "name" => "text-1735610854894-1",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Email",
                    "className" => "form-control",
                    "name" => "text-1735610934976-1",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "textarea",
                    "required" => true,
                    "label" => "Nomor Telepon",
                    "className" => "form-control",
                    "name" => "textarea-1735610978975-1",
                    "access" => false,
                    "subtype" => "textarea"
                ],
                [
                    "type" => "select",
                    "required" => true,
                    "label" => "Genre Musik",
                    "className" => "form-control",
                    "name" => "select-1735610905092-1",
                    "access" => false,
                    "options" => ['Pop', 'Rock', 'Jazz', 'R&B', 'Klasik']
                ]
            ])
        ]);

        // Lomba Sepak Bola untuk SD
        $lomba3 = Lomba::create([
            'lomba_nama' => 'Lomba Sepak Bola untuk SD',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Olahraga',
            'lomba_tanggal' => '2024-03-10', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'Lapangan Sepak Bola SDN 3 Jakarta',
            'lomba_kapasitas' => 200,
            'lomba_deskripsi' => 'Lomba sepak bola antar sekolah dasar yang menguji keterampilan teknik dasar sepak bola.',
            'lomba_poster' => 'https://drive.google.com/file/d/1V3Rv-tnHWQ2fcYtpsesJ1JyEWN0iMYDS/view?usp=sharing',
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba3->lomba_id,  // Menggunakan Lomba ID yang baru
            'form_content' => json_encode([
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Nama Lengkap",
                    "className" => "form-control",
                    "name" => "text-1735610854894-2",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Email",
                    "className" => "form-control",
                    "name" => "text-1735610934976-2",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "textarea",
                    "required" => true,
                    "label" => "Nomor Telepon",
                    "className" => "form-control",
                    "name" => "textarea-1735610978975-2",
                    "access" => false,
                    "subtype" => "textarea"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Posisi dalam Tim",
                    "className" => "form-control",
                    "name" => "text-1735610905092-2",
                    "access" => false,
                    "subtype" => "text"
                ]
            ])
        ]);

        // Lomba Baca Puisi
        $lomba4 = Lomba::create([
            'lomba_nama' => 'Lomba Baca Puisi',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Seni',
            'lomba_tanggal' => '2024-04-05', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'Gedung Kesenian Jakarta',
            'lomba_kapasitas' => 100,
            'lomba_deskripsi' => 'Lomba baca puisi tingkat nasional yang menguji kemampuan dalam membaca dan menghayati puisi.',
            'lomba_poster' => 'https://drive.google.com/file/d/1ICqYeGHaBoSR0dLKTe2UxMlNah_MbwSH/view?usp=sharing',
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba4->lomba_id,  // Menggunakan Lomba ID yang baru
            'form_content' => json_encode([
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Nama Lengkap",
                    "className" => "form-control",
                    "name" => "text-1735610854894-3",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Email",
                    "className" => "form-control",
                    "name" => "text-1735610934976-3",
                    "access" => false,
                    "subtype" => "text"
                ],
                [
                    "type" => "textarea",
                    "required" => true,
                    "label" => "Nomor Telepon",
                    "className" => "form-control",
                    "name" => "textarea-1735610978975-3",
                    "access" => false,
                    "subtype" => "textarea"
                ],
                [
                    "type" => "text",
                    "required" => true,
                    "label" => "Judul Puisi",
                    "className" => "form-control",
                    "name" => "text-1735610905092-3",
                    "access" => false,
                    "subtype" => "text"
                ]
            ])
        ]);
    }

}
