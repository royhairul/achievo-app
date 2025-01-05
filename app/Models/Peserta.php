<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class Peserta extends Model
{
    use HasFactory, HasRoles;

    // Tentukan tabel jika berbeda dari nama konvensional (opsional)
    protected $table = 'tb_peserta';

    // Tentukan primary key jika berbeda dari konvensi Laravel (opsional)
    protected $primaryKey = 'peserta_id';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'peserta_nama',
        'peserta_gender',
        'peserta_tanggallahir',
        'peserta_pendidikan',
        'peserta_email',
        'peserta_telepon',
    ];

    // Format untuk kolom tanggal
    protected $dates = ['peserta_tanggallahir'];

    // Tentukan apakah primary key auto increment atau tidak
    public $incrementing = true;

    // Tipe primary key jika bukan integer (opsional, bisa dihapus)
    protected $keyType = 'int';

    // Mendapatkan umur peserta
    public function getAge()
    {
        $birthDate = Carbon::parse($this->peserta_tanggallahir);
        $age = (int) $birthDate->diffInYears(now());
        return $age;
    }
}
