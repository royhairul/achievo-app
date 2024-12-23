<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class PesertaPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('cari');

        // Mendapatkan ID peserta yang login
        $pesertaId = $user->user_id;

        // Ambil data peserta
        $dataPeserta = Peserta::where('peserta_id', $pesertaId)->first();

        // Query untuk mendapatkan prestasi yang dimilki peserta
        $daftarPrestasi = Prestasi::where('prestasi_peserta', $dataPeserta->peserta_id)
            ->with('Lomba')
            ->select('tb_prestasi.*')
            ->get();

        // Mengirim data peserta dan lomba yang diikuti ke view
        return view('peserta.prestasi.index', compact('dataPeserta', 'daftarPrestasi'));
    }

    public function showFormPrestasi()
    {
        $user = Auth::user();

        $getUser = Auth::user();

        $peserta = $user->user_id;

        // Ambil data peserta
        $dataPeserta = Peserta::where('peserta_id', $peserta)->first();

        // Misalnya, redirect ke halaman sertifikat
        return view('peserta.form-prestasi', compact('peserta', 'dataPeserta'));
    }

    public function kirimPrestasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    // Memvalidasi apakah tanggal minimal adalah kemarin atau sebelumnya
                    if (\Carbon\Carbon::parse($value)->isAfter(\Carbon\Carbon::yesterday())) {
                        $fail('Batas minimal waktu perlombaan prestasi adalah kemarin atau sebelumnya.');
                    }
                },
            ],
            'penyelenggara' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'nominasi' => 'required|string',
            'sertifikat' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Ambil data peserta
        $user = Auth::user();
        // Mendapatkan ID peserta yang login
        $pesertaId = $user->user_id;

        // Ambil data peserta
        $peserta = Peserta::where('peserta_id', $pesertaId)->first();


        // Kombinasi penamaan file: nominasi + nama lomba + peserta_email + lomba_tanggal
        $nominasi = str_replace(' ', '_', strtolower($request->nominasi));
        $namaLomba = str_replace(' ', '_', strtolower($request->nama));
        $pesertaEmail = str_replace('@', '_', strtolower($peserta->peserta_email));
        $tanggalLomba = $request->tanggal;
        // Menambahkan waktu sekarang (tanggal, jam, menit, detik) ke penamaan file
        $currentTimestamp = \Carbon\Carbon::now()->format('Ymd_His');

        $fileName = "{$nominasi}_{$namaLomba}_{$pesertaEmail}_{$tanggalLomba}_{$currentTimestamp}.{$request->file('sertifikat')->getClientOriginalExtension()}";

        // Tentukan path penyimpanan
        $destinationPath = public_path('images/prestasi');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Pindahkan file ke folder
        $request->file('sertifikat')->move($destinationPath, $fileName);

        // Simpan data prestasi ke database
        Prestasi::create([
            'prestasi_nama' => $fileName,
            'prestasi_nomor' => $request->nomor,
            'prestasi_judul' => $request->nama,
            'prestasi_nominasi' => $request->nominasi,
            'prestasi_kategori' => $request->kategori,
            'prestasi_tanggal' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d'),
            'prestasi_peserta' => $peserta->peserta_id,
            'prestasi_penyelenggara' => $request->penyelenggara,
            'created_at' => now(),
        ]);


        return redirect()->route('pesertaListPrestasiRoute')->with('success', 'Sertifikat berhasil diberikan.');
    }

    public function deletePrestasi($prestasiId)
    {
        $user = Auth::user();

        // Cari data prestasi berdasarkan ID
        $prestasi = Prestasi::find($prestasiId);

        if (!$prestasi) {
            return redirect()->back()->with('error', 'Data prestasi tidak ditemukan.');
        }

        // Hapus data prestasi
        $prestasi->delete();

        return redirect()->back()->with('success', 'Prestasi ' . $prestasi->prestasi_nominasi . ' (' . $prestasi->prestasi_judul . ') berhasil dihapus.');
    }
}
