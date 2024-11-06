<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Penyelenggara;
use App\Models\Peserta;
use App\Models\Prestasi;
use App\Models;
use App\Models\JawabanForm;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showFormberiSertifikat($peserta_id, $lomba_id)
    {
        $getUser = Auth::user();
        // Logika pemberian sertifikat
        $peserta = Peserta::find($peserta_id);
        $lomba = Lomba::find($lomba_id);

        // Hitung jumlah lomba yang tanggal pendaftarannya besok atau lebih jauh
        $totalLomba = Lomba::where('lomba_penyelenggara', $getUser->user_id)
        ->where('lomba_tanggal', '>=', \Carbon\Carbon::tomorrow())
        ->count();

        // Memeriksa apa sudah bisa memberi sertif
        $belumBisaSertif = Lomba::where('lomba_id', $lomba_id)
        ->first();

        if ($belumBisaSertif && Carbon::parse($belumBisaSertif->lomba_tanggal)->isFuture()) {
            // Jika tanggal lomba adalah hari ini atau setelahnya
            return redirect()->route('penyelenggaraDetailLombaRoute', $lomba->lomba_id)->with('error', 'Anda belum bisa memberi sertifikat pada masa pendaftaran.');
        }

    // Misalnya, redirect ke halaman sertifikat
    return view('penyelenggara.beri-sertifikat', compact('peserta', 'lomba', 'totalLomba'));
    }
    
    public function beriSertifikat(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor' => 'required|string|max:255',
            'nominasi' => 'required|string',
            'sertifikat' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Ambil data peserta dan lomba
        $peserta = Peserta::find($request->peserta_id);
        $lomba = Lomba::find($request->lomba_id);
        $penyelenggara = Penyelenggara::where('penyelenggara_id', Auth::user()->user_id)->first();

        // Kombinasi penamaan file: nominasi + nama lomba + peserta_email + lomba_tanggal
        $nominasi = str_replace(' ', '_', strtolower($request->nominasi));
        $namaLomba = str_replace(' ', '_', strtolower($lomba->lomba_nama));
        $pesertaEmail = str_replace('@', '_', strtolower($peserta->peserta_email));
        $tanggalLomba = $lomba->lomba_tanggal;
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
            'prestasi_nominasi' => $request->nominasi,
            'prestasi_kategori' => $lomba->lomba_kategori,
            'prestasi_judul' => $lomba->lomba_nama,
            'prestasi_tanggal' => $lomba->lomba_tanggal,
            'prestasi_peserta' => $peserta->peserta_id,
            'prestasi_lomba' => $lomba->lomba_id,
            'prestasi_penyelenggara' => $penyelenggara->penyelenggara_nama,
            'created_at' => now(),
        ]);


        return redirect()->route('penyelenggaraDetailLombaRoute', $lomba->lomba_id)->with('success', 'Sertifikat berhasil diberikan.');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
