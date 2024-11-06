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
            'lomba_kategori' => 'Sains',
            'lomba_deskripsi' => 'Kompetisi nasional di bidang sains yang mempertemukan siswa-siswa terbaik dari seluruh Indonesia. Dalam lomba ini, peserta akan diuji kemampuan sains mereka melalui berbagai jenis soal yang menantang dan mengasah kreativitas serta logika. Lomba ini bertujuan untuk mengembangkan minat dan bakat siswa dalam bidang sains serta mempersiapkan mereka menghadapi tantangan global di masa depan.',
            'lomba_durasi' => 5,
            'lomba_lokasi' => 'Jakarta Science Center',
            'lomba_kapasitas' => 150,
            'lomba_poster' => 'https://cdn1-production-images-kly.akamaized.net/dh2NgXnisNbKl0ST8BcPJRZ6spI=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3394608/original/022336200_1615006012-20210306-Melihat_Para_Murid_Ikuti_Kompetisi_Sains_Nasional-1.JPG',
            'lomba_file' => 'panduan_osn.pdf',
            'lomba_persyaratan' => json_encode([
                'Warga Negara Indonesia',
                'Mendapat persetujuan dari orang tua/wali',
                'Diusulkan oleh Kepala Sekolah',
                'Berusia maksimal 18 tahun',
                'Memiliki nilai rata-rata rapor minimal 80',
                'Berbadan sehat yang dibuktikan dengan surat keterangan dokter',
            ]),
            'lomba_tanggal' => '2024-10-15', // Tanggal pelaksanaan lomba
            'lomba_penyelenggara' => 'Dinas Pendidikan Provinsi Jakarta'
        ]);

        // Data Lomba 2
        Lomba::create([
            'lomba_nama' => 'Kompetisi Matematika Nasional',
            'lomba_penyelenggara' => 'Lembaga Pendidikan Nasional',
            'lomba_kategori' => 'Matematika',
            'lomba_deskripsi' => 'Kompetisi tingkat nasional untuk bidang matematika yang bertujuan untuk menemukan dan mengasah potensi siswa dalam ilmu matematika. Lomba ini mencakup berbagai kategori soal yang menantang dan mendorong peserta untuk berpikir kritis. Selain itu, lomba ini juga merupakan sarana bagi siswa untuk bersaing secara sehat dan membangun networking dengan peserta dari daerah lain.',
            'lomba_durasi' => 3,
            'lomba_lokasi' => 'Grand City Convention & Exhibition Center',
            'lomba_kapasitas' => 200,
            'lomba_poster' => 'https://v-images2.antarafoto.com/kompetisi-matematika-ljsgjk-prv.jpg',
            'lomba_file' => 'panduan_kmn.pdf',
            'lomba_persyaratan' => json_encode([
                'Peserta adalah siswa SMA/SMK/MA kelas 10 atau 11',
                'Mendapat izin dari orang tua/wali',
                'Terdaftar di sekolah asal',
                'Memiliki prestasi akademik minimal 85 di bidang Matematika',
                'Memiliki pengalaman mengikuti lomba matematika sebelumnya',
                'Bersedia mengikuti pembekalan sebelum lomba',
                'Tidak sedang mengikuti program beasiswa penuh dari instansi lain',
            ]),
            'lomba_tanggal' => '2024-11-05', // Tanggal pelaksanaan lomba
        ]);

        // Data Lomba 3
        Lomba::create([
            'lomba_nama' => 'Hackathon Coding Championship',
            'lomba_penyelenggara' => 'Tech Innovators Community',
            'lomba_kategori' => 'Teknologi',
            'lomba_deskripsi' => 'Kompetisi coding selama 24 jam non-stop yang menantang peserta untuk menciptakan solusi teknologi inovatif. Dalam lomba ini, peserta akan dibagi ke dalam tim dan dituntut untuk menyelesaikan proyek coding dalam waktu terbatas. Peserta diharapkan dapat memanfaatkan kemampuan teknis mereka serta keterampilan kolaboratif untuk meraih sukses dalam lomba ini, di mana hasil akhir akan dinilai oleh para juri yang kompeten di bidang teknologi.',
            'lomba_durasi' => 1,
            'lomba_lokasi' => 'Tech Park Bandung',
            'lomba_kapasitas' => 50,
            'lomba_poster' => 'https://topcareer.id/wp-content/uploads/2020/02/2019-Hackathon-Photo-by-Randy-and-Jackie-Smith.jpg',
            'lomba_file' => 'panduan_hackathon.pdf',
            'lomba_persyaratan' => json_encode([
                'Mampu coding dengan bahasa pemrograman apapun',
                'Berusia di bawah 30 tahun',
                'Mampu bekerja dalam tim minimal 3 orang',
                'Pernah mengikuti workshop atau pelatihan coding',
                'Membawa laptop dan perangkat sendiri',
                'Menyiapkan presentasi proyek secara langsung',
                'Berbadan sehat yang dibuktikan dengan surat keterangan dokter',
            ]),
            'lomba_tanggal' => '2024-12-01', // Tanggal pelaksanaan lomba
        ]);
    }
}