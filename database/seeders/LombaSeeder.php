<?php

namespace Database\Seeders;

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
        Lomba::create([
            'lomba_nama' => 'Olimpiade Sains Nasional',
            'lomba_penyelenggara' => 'Dinas Pendidikan Provinsi Jakarta',
            'lomba_kategori' => 'Sains',
            'lomba_tanggal' => '2024-10-15', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'Jakarta Science Center',
            'lomba_kapasitas' => 150,
            'lomba_deskripsi' => 'Kompetisi nasional di bidang sains yang mempertemukan siswa-siswa terbaik dari seluruh Indonesia. Dalam lomba ini, peserta akan diuji kemampuan sains mereka melalui berbagai jenis soal yang menantang dan mengasah kreativitas serta logika. Lomba ini bertujuan untuk mengembangkan minat dan bakat siswa dalam bidang sains serta mempersiapkan mereka menghadapi tantangan global di masa depan.',
            'lomba_poster' => 'https://cdn1-production-images-kly.akamaized.net/dh2NgXnisNbKl0ST8BcPJRZ6spI=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3394608/original/022336200_1615006012-20210306-Melihat_Para_Murid_Ikuti_Kompetisi_Sains_Nasional-1.JPG',
            'lomba_form' => Lomba::latest('id')->first()->form_id,
        ]);

        // Data Lomba 2
        Lomba::create([
            'lomba_nama' => 'Kompetisi Matematika Nasional',
            'lomba_penyelenggara' => 'Lembaga Pendidikan Nasional',
            'lomba_kategori' => 'Matematika',
            'lomba_tanggal' => '2024-11-05', // Tanggal pelaksanaan lomba
            'lomba_lokasi' => 'Grand City Convention & Exhibition Center',
            'lomba_kapasitas' => 200,
            'lomba_deskripsi' => 'Kompetisi tingkat nasional untuk bidang matematika yang bertujuan untuk menemukan dan mengasah potensi siswa dalam ilmu matematika. Lomba ini mencakup berbagai kategori soal yang menantang dan mendorong peserta untuk berpikir kritis. Selain itu, lomba ini juga merupakan sarana bagi siswa untuk bersaing secara sehat dan membangun networking dengan peserta dari daerah lain.',
            'lomba_poster' => 'https://v-images2.antarafoto.com/kompetisi-matematika-ljsgjk-prv.jpg',
            'lomba_form' => Lomba::latest()->first()->form_id,
        ]);
    }
}
