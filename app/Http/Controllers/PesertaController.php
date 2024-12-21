<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use App\Models\Lomba;
use App\Models\Penyelenggara;
use App\Models\Prestasi;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use Carbon\Carbon;
use Auth;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getUser = Auth::user()->user_id;


        $dataPeserta = Peserta::where('peserta_id', $getUser)->get()[0];

        // Ambil daftar lomba yang diikuti oleh peserta
        $lombaDiikuti = Lomba::whereHas('jawabanForms', function ($query) use ($getUser) {
            $query->where('jawaban_peserta', $getUser);
        })
        ->with('penyelenggara') // Mengambil relasi penyelenggara
        ->orderBy('lomba_tanggal', 'desc') // Urutkan berdasarkan tanggal
        ->get();

        // Ambil prestasi yang dimiliki peserta
        $prestasiPeserta = Prestasi::where('prestasi_peserta', $dataPeserta->peserta_id)
        ->with('Lomba') // Mengambil relasi lomba jika ada
        ->get();

        return view('peserta.index', compact('dataPeserta','prestasiPeserta', 'lombaDiikuti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listLomba(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('cari');

        // Mendapatkan ID peserta yang login
        $pesertaId = $user->user_id;

        // Ambil data peserta
        $dataPeserta = Peserta::where('peserta_id', $pesertaId)->first();

        // Query untuk mendapatkan lomba yang diikuti peserta
        $query = Lomba::join('tb_jawaban', 'tb_lomba.lomba_id', '=', 'tb_jawaban.jawaban_lomba')
            ->where('tb_jawaban.jawaban_peserta', $pesertaId)
            ->select('tb_lomba.*')
            ->distinct();

        // Variabel untuk menampilkan pesan
        $noResultsMessage = '';
        $noLombaMessage = '';

        // Cek apakah peserta telah mendaftar untuk lomba
        $hasJoinedLomba = $query->exists(); // Cek apakah ada lomba yang diikuti peserta

        // Jika peserta belum mendaftar untuk lomba apapun
        if (!$hasJoinedLomba) {
            $noLombaMessage = 'Anda belum mendaftar untuk lomba manapun.';
            $lomba = collect(); // Set loma menjadi collection kosong
        } else {
            // Jika tidak ada keyword, tampilkan semua lomba yang diikuti peserta tanpa batasan waktu
            if (empty($keyword)) {
                $lomba = $query->get(); // Ambil semua lomba tanpa batasan waktu
            } else {
                // Mencari berdasarkan kata kunci
                $keyword = strtolower($keyword);
                // Cek jika input adalah tahun
                if (preg_match('/^\d{4}$/', trim($keyword))) { // Memeriksa jika input adalah tahun (4 digit)
                    $year = trim($keyword);
                    $lomba = $query->whereYear('lomba_tanggal', $year)->get();
                } else {
                    // Mencari berdasarkan bulan dan tahun
                    if (preg_match('/^(january|february|march|april|may|june|july|august|september|october|november|december)(?:\s(\d{4}))?$/', $keyword, $matches)) {
                        $monthName = ucfirst($matches[1]); // Nama bulan
                        $year = isset($matches[2]) ? $matches[2] : Carbon::now()->year; // Ambil tahun jika ada, jika tidak ambil tahun ini

                        // Mengubah nama bulan menjadi nomor bulan
                        $monthNumber = Carbon::createFromFormat('F', $monthName)->format('m');

                        // Mengatur query untuk mencari lomba di bulan dan tahun yang ditentukan
                        $lomba = $query->whereMonth('lomba_tanggal', $monthNumber)
                            ->whereYear('lomba_tanggal', $year)
                            ->get();
                    } else {
                        // Jika ada keyword, lakukan pencarian berdasarkan nama lomba atau kategori
                        $lomba = $query->where(function ($q) use ($keyword) {
                            $q->where('lomba_nama', 'LIKE', "%$keyword%")
                                ->orWhere('lomba_kategori', 'LIKE', "%$keyword%");
                        })
                        ->get();
                    }
                }

                // Jika hasil pencarian kosong
                if ($lomba->isEmpty()) {
                    $noResultsMessage = 'Tidak ada yang cocok dengan pencarian ('.$keyword.')';
                    $lomba = $query->get(); // Ambil semua lomba yang diikuti peserta
                }
            }
        }

        // Mengirim data peserta dan lomba yang diikuti ke view
        return view('peserta.list-lomba', compact('dataPeserta', 'lomba', 'noResultsMessage', 'noLombaMessage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePesertaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showFormFeedback($lombaId)
    {
        $dataPeserta = Peserta::where('peserta_id', Auth::user()->user_id)->first();
        $lomba = Lomba::findOrFail($lombaId); // Ambil data lomba berdasarkan ID
        $penyelenggara = Penyelenggara::findOrFail($lomba->lomba_penyelenggara); // Ambil data penyelenggara berdasarkan lomba_penyelenggara

        // Periksa apakah peserta sudah memberikan feedback untuk lomba ini
        $feedback = Feedback::where('feedback_lomba', $lombaId)
            ->where('feedback_peserta', $dataPeserta->peserta_id)
            ->first();
        
        // Memeriksa apa sudah bisa memberi feedback
        $belumBisaFeedback = Prestasi::where('prestasi_lomba', $lombaId)
        ->where('prestasi_peserta', $dataPeserta->peserta_id)
        ->first();

        if (!$belumBisaFeedback) {
            // Jika belum bisa memberikan feedback, redirect kembali dengan pesan error
            return redirect()->route('pesertaListLombaRoute')->with('error', 'Anda belum bisa memberi feedback pada lomba ('. $lomba->lomba_nama.')');
        } else if ($feedback) {
            // Jika sudah memberikan feedback, redirect kembali dengan pesan error
            return redirect()->route('pesertaListLombaRoute')->with('error', 'Anda sudah memberi feedback pada lomba ('. $lomba->lomba_nama.')');
        }

        return view('peserta.form-feedback', compact('dataPeserta', 'lomba','penyelenggara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function kirimFeedback(Request $request, $lombaId)
    {
        $request->validate([
            'feedback_rating' => 'required|numeric|min:1|max:5',
            'feedback_isi' => 'required|string|max:500',
        ]);

        // Menyimpan feedback
        Feedback::create([
            'feedback_rating' => $request->feedback_rating,
            'feedback_isi' => $request->feedback_isi,
            'feedback_peserta' => Auth::user()->user_id,
            'feedback_lomba' => $lombaId,
        ]);

        return redirect()->route('pesertaListLombaRoute')->with('success', 'Feedback berhasil dikirim.');
    }

    /**
     * Remove the specified resource from storage.
     */
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

    return redirect()->back()->with('success', 'Prestasi '.$prestasi->prestasi_nominasi.' ('.$prestasi->prestasi_judul.') berhasil dihapus.');
    }
}
