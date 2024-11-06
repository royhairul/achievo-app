<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'tb_feedback';
    protected $primaryKey = 'feedback_id';

    protected $fillable = [
        'feedback_rating',
        'feedback_isi',
        'feedback_peserta',
        'feedback_lomba',
    ];

    // Relasi ke Peserta
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'feedback_peserta');
    }

    // Relasi ke Lomba
    public function lomba()
    {
        return $this->belongsTo(Lomba::class, 'feedback_lomba');
    }
}
