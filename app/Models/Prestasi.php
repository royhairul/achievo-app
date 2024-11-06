<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'tb_prestasi';
    protected $primaryKey = 'prestasi_id';

    protected $fillable = [
        'prestasi_nama',
        'prestasi_nomor',
        'prestasi_nominasi',
        'prestasi_judul',
        'prestasi_kategori',
        'prestasi_tanggal',
        'prestasi_peserta',
        'prestasi_lomba',
        'prestasi_penyelenggara',
    ];

    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'prestasi_lomba', 'lomba_id');
    }

    public function penyelenggara()
    {
        return $this->belongsTo(Penyelenggara::class, 'lomba_id', 'penyelenggara_id');
    }
}
