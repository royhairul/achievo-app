<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PencarianController extends Controller
{
    public function index()
    {
        $daftarLomba = Lomba::
            join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->get();
        // return view("pencarian", compact("daftarLomba"));
    }

    private function isDate($value)
    {
        // Array bulan dalam bahasa Indonesia
        $bulanIndo = [
            'januari' => 1,
            'februari' => 2,
            'maret' => 3,
            'april' => 4,
            'mei' => 5,
            'juni' => 6,
            'juli' => 7,
            'agustus' => 8,
            'september' => 9,
            'oktober' => 10,
            'november' => 11,
            'desember' => 12
        ];

        try {
            // Cek apakah format tanggal sesuai dengan bulan dan tahun dalam bahasa Indonesia
            if (preg_match('/^(januari|februari|maret|april|mei|juni|juli|agustus|september|oktober|november|desember)(?:\s(\d{4}))?$/i', $value, $matches)) {
                // Ekstraksi nama bulan dan tahun dari input
                $monthName = strtolower($matches[1]);
                $year = isset($matches[2]) ? $matches[2] : Carbon::now()->year;

                // Cek apakah bulan valid dalam bahasa Indonesia
                if (array_key_exists($monthName, $bulanIndo)) {
                    $monthNumber = $bulanIndo[$monthName]; // Ambil nomor bulan

                    // Cek apakah tanggal valid untuk bulan dan tahun tersebut
                    $date = Carbon::createFromFormat('Y-m', "$year-$monthNumber");

                    // Jika valid, return true
                    return true;
                }
            } else {
                // Jika input tidak sesuai bulan dan tahun dalam bahasa Indonesia, coba parse sebagai tanggal biasa
                Carbon::parse($value);
                return true;
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, return false
            return false;
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->input('cari');

        $cariLomba = Lomba::
            join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->where(function ($query) use ($keyword) {
                $query->where('tb_lomba.lomba_nama', 'like', '%' . $keyword . '%')
                    ->orWhere('tb_lomba.lomba_tanggal', 'like', '%' . $keyword . '%')
                    ->orWhere('tb_lomba.lomba_kategori', 'like', '%' . $keyword . '%')
                    ->orWhere('tb_lomba.lomba_deskripsi', 'like', '%' . $keyword . '%')
                    ->orWhere('tb_penyelenggara.penyelenggara_nama', 'like', '%' . $keyword . '%');
            })
            ->when($this->isDate($keyword), function ($query) use ($keyword) {
                // Array bulan dalam bahasa Indonesia (termasuk huruf kapital pertama)
                $bulanIndo = [
                    'januari' => 'January',
                    'februari' => 'February',
                    'maret' => 'March',
                    'april' => 'April',
                    'mei' => 'May',
                    'juni' => 'June',
                    'juli' => 'July',
                    'agustus' => 'August',
                    'september' => 'September',
                    'oktober' => 'October',
                    'november' => 'November',
                    'desember' => 'December'
                ];

                // Ubah keyword menjadi lowercase agar pencocokan bulan tidak sensitif terhadap kapitalisasi
                $keywordLower = strtolower($keyword);

                // Mengecek jika keyword adalah bulan dan tahun dalam bahasa Indonesia
                if (preg_match('/^(januari|februari|maret|april|mei|juni|juli|agustus|september|oktober|november|desember)(?:\s(\d{4}))?$/i', $keywordLower, $matches)) {
                    $monthName = strtolower($matches[1]); // Bulan dalam lowercase
                    $year = isset($matches[2]) ? $matches[2] : Carbon::now()->year; // Jika tidak ada tahun, gunakan tahun sekarang
    
                    // Cek apakah bulan valid dalam bahasa Indonesia
                    if (array_key_exists($monthName, $bulanIndo)) {
                        $monthNameEnglish = $bulanIndo[$monthName]; // Nama bulan dalam bahasa Inggris
                        // Membuat format bulan dan tahun yang valid untuk Carbon
                        $dateString = $monthNameEnglish . ' ' . $year;
                        $date = Carbon::parse($dateString);
                        $query->whereMonth('tb_lomba.lomba_tanggal', '=', $date->month)
                            ->whereYear('tb_lomba.lomba_tanggal', '=', $date->year);
                    }
                } else {
                    // Jika input adalah tanggal biasa (misalnya: "2025-03-01")
                    $date = Carbon::parse($keyword);
                    $query->orWhereYear('tb_lomba.lomba_tanggal', '=', $date->year)
                        ->whereMonth('tb_lomba.lomba_tanggal', '=', $date->month)
                        ->whereDay('tb_lomba.lomba_tanggal', '=', $date->day);
                }
            })
            ->get();

        $daftarLomba = Lomba::
            join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->get();

        if (Auth::check()) {
            // Rekomendasi lomba
            $user = Auth::user();
            $dataPeserta = Peserta::where('peserta_id', $user->user_id)->first();

            // Ambil kategori yang pernah diikuti oleh peserta
            $kategoriDiikuti = Lomba::join('tb_jawaban', 'tb_lomba.lomba_id', '=', 'tb_jawaban.jawaban_lomba')
                ->where('tb_jawaban.jawaban_peserta', $user->user_id)
                ->distinct()
                ->pluck('lomba_kategori');

            if ($kategoriDiikuti->isNotEmpty()) {
                $rekomendasiLomba = Lomba::
                    join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
                    ->select('tb_lomba.*', 'penyelenggara_nama')
                    ->where('lomba_kategori', $kategoriDiikuti)
                    // ->whereIn('lomba_jenjang', [$dataPeserta->peserta_jenjang ?? '', 'Umum'])
                    ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                    ->get();
            } else {
                $rekomendasiLomba = Lomba::
                    join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
                    ->select('tb_lomba.*', 'penyelenggara_nama')
                    // ->whereIn('lomba_jenjang', [$dataPeserta->peserta_jenjang ?? '', 'Umum'])
                    ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                    ->get();
            }
        } else {
            $rekomendasiLomba = null;
        }

        // Menampilkan hasil ke view
        return view('pencarian', compact('keyword', 'cariLomba', 'daftarLomba', 'rekomendasiLomba'));
    }
}
