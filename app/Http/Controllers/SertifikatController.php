<?php

namespace App\Http\Controllers;

use App\Models\JawabanForm;
use App\Models\Lomba;
use App\Models\Sertifikat;
use Auth;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function createSertifikat($id)
    {
        $getUser = Auth::user();
        $totalLomba = Lomba::where('lomba_penyelenggara', $getUser->user_id)->count();
        $idJawaban = $id;
        return view('penyelenggara.sertifikatLomba.create', compact('totalLomba', 'idJawaban'));
    }

    public function storeSertifikat(Request $request)
    {
        $validateData = $request->validate([
            'peringkat' => 'required',
            'file' => 'required',
            'pesan' => '',
        ]);

        if ($validateData) {
            $getIdJawaban = $request->input('jawaban_id');
            $tbJawaban = JawabanForm::where('jawaban_id', $getIdJawaban)->first();

            // Mengelola Data Gambar
            // Generate nama file yang unik
            $image = $request->file('file'); // Ambil file gambar
            $timestamp = \Carbon\Carbon::now()->format('YmdHis'); // Waktu detail (tahun, bulan, hari, jam, menit, detik)
            $buktiNama = str_replace(' ', '_', strtolower($request->name)) . '_' . $timestamp . '.' . $image->getClientOriginalExtension();

            // Cek apakah file dengan nama yang sama sudah ada di public storage
            if (file_exists(public_path('images/' . $buktiNama)) || Sertifikat::where('sertifikat_file', $buktiNama)->exists()) {
                return back()->withErrors(['file' => 'Coba lagi dalam beberapa saat.']);
            }

            // Pindahkan file ke folder 'images'
            $image->move(public_path('images'), $buktiNama);

            // Pemisahan data
            $dataSertifikat = [
                'sertifikat_peserta' => $tbJawaban->jawaban_peserta,
                'sertifikat_lomba' => $tbJawaban->jawaban_lomba,
                'sertifikat_peringkat' => $request->input('peringkat'),
                'sertifikat_file' => $buktiNama,
            ];

            $pesanSertifikat = $request->input('pesan');

            if (isset($pesanSertifikat)) {
                $dataSertifikat['sertifikat_pesan'] = $pesanSertifikat;
            }


            // Masukkan data ke dalam tb_sertifikat
            $tbSertifikat = Sertifikat::insert($dataSertifikat);

            // Edit status jawaban_hasSertifikat
            $update = $tbJawaban->update(['jawaban_hasSertifikat' => true]);

            return redirect()->route('penyelenggaraLombaRoute');
        }
    }
}
