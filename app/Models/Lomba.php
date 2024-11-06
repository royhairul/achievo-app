<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    // Tentukan tabel jika berbeda dari nama konvensional (opsional)
    protected $table = 'tb_lomba';

    // Tentukan primary key jika berbeda dari konvensi Laravel (opsional)
    protected $primaryKey = 'lomba_id';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'lomba_nama',
        'lomba_penyelenggara',
        'lomba_kategori',
        'lomba_tanggal',
        'lomba_lokasi',
        'lomba_kapasitas',
        'lomba_deskripsi',
        'lomba_poster',
        'lomba_form',
    ];

    /**
     * Mendapatkan penyelenggara lomba.
     */
    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'lomba_penyelenggara', 'penyelenggara_id');
    }

    // Appends untuk properti dinamis
    protected $appends = ['average_rating', 'most_common_words'];

    /**
     * Mendapatkan feedback lomba.
     */
    // Definisikan relasi dengan Feedback
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'feedback_lomba'); // Sesuaikan 'lomba_id' dengan nama kolom yang sesuai di tabel feedback
    }

    // relasi dengan peserta
    public function peserta()
    {
        return $this->hasMany(JawabanForm::class, 'jawaban_lomba', 'lomba_id');
    }

    /**
     * Menghitung rata-rata rating.
     */
    public function getAverageRatingAttribute()
    {
        $ratings = $this->feedback->pluck('feedback_rating')->map(function ($rating) {
            return (float) $rating; // Mengonversi rating ke float
        })->toArray();

        return $ratings ? array_sum($ratings) / count($ratings) : 0;
    }

    /**
     * Menghitung kata-kata yang paling sering digunakan dalam feedback.
     */
    public function getMostCommonWordsAttribute()
    {
        $words = [];
        foreach ($this->feedback as $feedback) {
            $words = array_merge($words, explode(' ', $feedback->feedback_isi));
        }

        $wordCount = array_count_values($words);
        arsort($wordCount); // Urutkan berdasarkan frekuensi
        return array_slice($wordCount, 0, 3); // Ambil 5 kata terbanyak
    }

    public function getReviewCountAttribute()
    {
        return $this->feedback->count(); // Menghitung jumlah pengulas
    }

    /**
     * Mendapatkan jawaban yang terkait dengan lomba ini.
     */
    public function jawabanForms()
    {
        return $this->hasMany(JawabanForm::class, 'jawaban_lomba', 'lomba_id');
    }

    /**
     * Mendapatkan status lomba.
     *
     * @return string
     */
    public function getStatusLomba()
    {
        // Contoh logika status lomba
        return $this->lomba_durasi > 0 ? 'Aktif' : 'Selesai';
    }
    /**
     * Menghasilkan form lomba.
     *
     * @return array
     */
    public function formLomba()
    {
        return [
            'nama' => $this->lomba_nama,
            'kategori' => $this->lomba_kategori,
            'deskripsi' => $this->lomba_deskripsi,
            'persyaratan' => $this->lomba_persyaratan, // Data persyaratan JSON
        ];
    }

    /**
     * Mendapatkan detail lengkap lomba.
     *
     * @return array
     */
    public function detailLomba()
    {
        return [
            'nama' => $this->lomba_nama,
            'kategori' => $this->lomba_kategori,
            'deskripsi' => $this->lomba_deskripsi,
            'lokasi' => $this->lomba_lokasi,
            'kapasitas' => $this->lomba_kapasitas,
            'persyaratan' => $this->lomba_persyaratan,  // Persyaratan JSON
        ];
    }
}
