<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = 'tb_sertifikat';

    protected $primaryKey = 'sertifikat_id';

    protected $fillable = [
        'sertifikat_peserta',
        'sertifikat_lomba',
        'sertifikat_peringkat',
        'sertifikat_nomor',
        'sertifikat_file',
    ];

}
