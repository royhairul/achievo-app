<?php

namespace Database\Seeders;

use App\Models\FormLomba;
use App\Models\Penyelenggara;
use Illuminate\Database\Seeder;
use App\Models\Lomba;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Lomba Catur Nasional
        $lomba1 = Lomba::create([
            'lomba_nama' => 'Lomba Catur Nasional',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Sains',
            'lomba_tanggal' => '2025-01-28',
            'lomba_lokasi' => 'Catur Center Jakarta',
            'lomba_kapasitas' => 150,
            'lomba_deskripsi' => 'Kompetisi nasional di bidang sains yang mempertemukan siswa-siswa terbaik dari seluruh Indonesia...',
            'lomba_poster' => 'https://drive.google.com/file/d/1hWjB3OXuAZbtLU7xpxPGpv6ZkeigeNId/view?usp=sharing',
            'lomba_jenjang' => 'Umum' // Menambahkan kolom jenjang
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba1->lomba_id,
            'form_content' => json_encode([
                [
                    "name" => "peserta_nama",
                    "type" => "text",
                    "label" => "~Nama Lengkap",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nama Anda..."
                ],
                [
                    "name" => "peserta_email",
                    "type" => "text",
                    "label" => "~Email",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Email Anda..."
                ],
                [
                    "name" => "peserta_telepon",
                    "type" => "text",
                    "label" => "~Nomor Telepon",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nomor Telepon Anda..."
                ],
                [
                    "name" => "number-1735610905092-0",
                    "type" => "number",
                    "label" => "Usia",
                    "subtype" => "number",
                    "required" => false,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Usia Anda..."
                ]
            ])
        ]);

        // Lomba Band se-SMA
        $lomba2 = Lomba::create([
            'lomba_nama' => 'Lomba Band se-SMA',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Seni',
            'lomba_tanggal' => '2025-02-15',
            'lomba_lokasi' => 'SMA Negeri 1 Jakarta',
            'lomba_kapasitas' => 100,
            'lomba_deskripsi' => 'Lomba band tingkat SMA yang menguji kemampuan vokal dan ekspresi peserta...',
            'lomba_poster' => 'https://drive.google.com/file/d/1U0eitknAIfaXRcDHK1kl83G7OYnnpKDo/view?usp=sharing',
            'lomba_jenjang' => 'SMA' // Menambahkan kolom jenjang
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba2->lomba_id,
            'form_content' => json_encode([
                [
                    "name" => "peserta_nama",
                    "type" => "text",
                    "label" => "~Nama Lengkap",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nama Anda..."
                ],
                [
                    "name" => "peserta_email",
                    "type" => "text",
                    "label" => "~Email",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Email Anda..."
                ],
                [
                    "name" => "peserta_telepon",
                    "type" => "text",
                    "label" => "~Nomor Telepon",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nomor Telepon Anda..."
                ],
                [
                    "name" => "select-1735610905092-1",
                    "type" => "select",
                    "label" => "Genre Musik",
                    "values" => [
                        ["label" => "Pop", "value" => "Pop", "selected" => false],
                        ["label" => "Rock", "value" => "Rock", "selected" => false],
                        ["label" => "Jazz", "value" => "Jazz", "selected" => false],
                        ["label" => "R&B", "value" => "R&B", "selected" => false],
                        ["label" => "Klasik", "value" => "Klasik", "selected" => false],
                    ],
                    "multiple" => false,
                    "required" => true,
                    "className" => "form-control"
                ]
            ])
        ]);

        // Lomba Sepak Bola untuk SD
        $lomba3 = Lomba::create([
            'lomba_nama' => 'Lomba Sepak Bola untuk SD',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Olahraga',
            'lomba_tanggal' => '2025-03-10',
            'lomba_lokasi' => 'Lapangan Sepak Bola SDN 3 Jakarta',
            'lomba_kapasitas' => 200,
            'lomba_deskripsi' => 'Lomba sepak bola antar sekolah dasar...',
            'lomba_poster' => 'https://drive.google.com/file/d/1V3Rv-tnHWQ2fcYtpsesJ1JyEWN0iMYDS/view?usp=sharing',
            'lomba_jenjang' => 'SD' // Menambahkan kolom jenjang
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba3->lomba_id,
            'form_content' => json_encode([
                [
                    "name" => "peserta_nama",
                    "type" => "text",
                    "label" => "~Nama Lengkap",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nama Anda..."
                ],
                [
                    "name" => "peserta_email",
                    "type" => "text",
                    "label" => "~Email",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Email Anda..."
                ],
                [
                    "name" => "peserta_telepon",
                    "type" => "text",
                    "label" => "~Nomor Telepon",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nomor Telepon Anda..."
                ],
                [
                    "name" => "text-1735610905092-2",
                    "type" => "text",
                    "label" => "Posisi dalam Tim",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Posisi Anda dalam Tim..."
                ]
            ])
        ]);

        // Lomba Baca Puisi
        $lomba4 = Lomba::create([
            'lomba_nama' => 'Lomba Baca Puisi',
            'lomba_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'lomba_kategori' => 'Seni',
            'lomba_tanggal' => '2025-04-05',
            'lomba_lokasi' => 'Gedung Kesenian Jakarta',
            'lomba_kapasitas' => 100,
            'lomba_deskripsi' => 'Lomba baca puisi tingkat nasional...',
            'lomba_poster' => 'https://drive.google.com/file/d/1ICqYeGHaBoSR0dLKTe2UxMlNah_MbwSH/view?usp=sharing',
            'lomba_jenjang' => 'Umum' // Menambahkan kolom jenjang
        ]);

        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first()->penyelenggara_id,
            'form_lomba' => $lomba4->lomba_id,
            'form_content' => json_encode([
                [
                    "name" => "peserta_nama",
                    "type" => "text",
                    "label" => "~Nama Lengkap",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nama Anda..."
                ],
                [
                    "name" => "peserta_email",
                    "type" => "text",
                    "label" => "~Email",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Email Anda..."
                ],
                [
                    "name" => "peserta_telepon",
                    "type" => "text",
                    "label" => "~Nomor Telepon",
                    "subtype" => "text",
                    "required" => true,
                    "className" => "form-control",
                    "placeholder" => "Masukkan Nomor Telepon Anda..."
                ]
            ])
        ]);
    }
}
