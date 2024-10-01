<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;

    // Tentukan tabel jika berbeda dari nama konvensional
    protected $table = 'tb_penyelenggara';

    // Tentukan primary key
    protected $primaryKey = 'penyelenggara_id';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'penyelenggara_nama',
        'penyelenggara_alamat',
        'penyelenggara_tahunberdiri',
        'penyelenggara_bidang',
        'penyelenggara_email',
        'penyelenggara_telepon',
    ];

    // Format kolom tanggal
    protected $dates = ['penyelenggara_tahunberdiri'];

    // Tentukan apakah primary key auto increment atau tidak
    public $incrementing = true;

    // Tipe primary key jika bukan integer
    protected $keyType = 'int';
}
