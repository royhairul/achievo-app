<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanForm extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'tb_jawaban';

    // Tentukan primary key jika berbeda dari konvensi Laravel (opsional)
    protected $primaryKey = 'jawaban_id';


    protected $fillable = [
        'jawaban_label',
        'jawaban_content',
        'jawaban_input',
        'jawaban_peserta',
        'jawaban_penyelenggara',
        'jawaban_lomba'
    ];

    protected $casts = [
        'form' => 'array'
    ];
}
