<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLomba extends Model
{
    use HasFactory;

    protected $table = 'tb_form';

    // Tentukan primary key jika berbeda dari konvensi Laravel (opsional)
    protected $primaryKey = 'form_id';


    protected $fillable = [
        'form_penyelenggara',
        'form_lomba',
        'form_content'
    ];

    protected $casts = [
        'form' => 'array'
    ];
}
