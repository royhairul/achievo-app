<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\FormLomba;
use App\Models\JawabanForm;
use App\Models\Peserta;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LombaController extends Controller
{
    /**
     * Menampilkan semua daftar lomba.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data lomba dari database
        $lomba = Lomba::
            join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->get();


        // dd($lomba);
        // Mengirimkan data lomba ke view 'lomba.index'
        return view('pencarian', compact('lomba'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('cari');
        $user = Auth::user();
        $recommendationLomba = [];
        $showAllLomba = false;

        // Bagian Rekomendasi hanya untuk peserta yang sudah login
        if ($user) {
            $pesertaId = $user->user_id;

            // Ambil kategori yang pernah diikuti oleh peserta
            $kategoriDiikuti = Lomba::join('tb_jawaban', 'tb_lomba.lomba_id', '=', 'tb_jawaban.jawaban_lomba')
                ->where('tb_jawaban.jawaban_peserta', $pesertaId)
                ->distinct()
                ->pluck('lomba_kategori');

            if ($kategoriDiikuti->isNotEmpty()) {
                // Query untuk rekomendasi lomba berdasarkan kategori yang pernah diikuti peserta
                $recommendationLomba = Lomba::whereIn('lomba_kategori', $kategoriDiikuti)
                    ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                    ->take(3)
                    ->get();
            } else {
                // Jika tidak ada kategori yang diikuti, rekomendasikan 3 lomba dengan pendaftar terbanyak
                $recommendationLomba = Lomba::select('tb_lomba.*')
                    ->join('tb_jawaban', 'tb_lomba.lomba_id', '=', 'tb_jawaban.jawaban_lomba')
                    ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                    ->groupBy('tb_lomba.lomba_id') // Kelompokkan berdasarkan ID lomba
                    ->orderByRaw('COUNT(tb_jawaban.jawaban_peserta) DESC') // Urutkan berdasarkan jumlah jawaban peserta terbanyak
                    ->take(3)
                    ->get();
            }
        }

        // Bagian untuk pencarian lomba (keyword dapat kosong)
        $query = Lomba::query();

        // Jika tidak ada keyword, tampilkan semua lomba yang masih terbuka
        if (empty($keyword)) {
            $lomba = $query->where('lomba_tanggal', '>=', Carbon::tomorrow())->take(30)->get(); // Batasi hasil 30
            $showAllLomba = true;
        } else {
            // Mengubah keyword menjadi lowercase untuk pencocokan yang tidak case-sensitive
            $keyword = strtolower($keyword);

            // Cek jika input adalah tahun
            if (preg_match('/^\d{4}$/', trim($keyword))) { // Memeriksa jika input adalah tahun (4 digit)
                $year = trim($keyword);
                $lomba = $query->whereYear('lomba_tanggal', $year)
                    // ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                    ->take(30) // Batasi hasil hingga 30
                    ->get();
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
                        // ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                        ->take(30) // Batasi hasil hingga 30
                        ->get();
                } else {
                    // Jika ada keyword, lakukan pencarian berdasarkan nama lomba atau kategori
                    $lomba = $query->where(function ($q) use ($keyword) {
                        $q->where('lomba_nama', 'LIKE', "%$keyword%")
                            ->orWhere('lomba_kategori', 'LIKE', "%$keyword%");
                    })
                        // ->where('lomba_tanggal', '>=', Carbon::tomorrow())
                        ->take(30) // Batasi hasil hingga 30
                        ->get();
                }

                // Jika hasil pencarian kosong, tampilkan semua lomba tersedia
                if ($lomba->isEmpty()) {
                    $lomba = Lomba::where('lomba_tanggal', '>=', Carbon::tomorrow())->take(30)->get();
                    $showAllLomba = true;
                }
            }
        }

        // Menampilkan hasil ke view
        return view('pencarian', compact('lomba', 'recommendationLomba', 'showAllLomba', 'keyword', 'user'));
    }

    /**
     * Display the specified resource.
     */
    public function show($idLomba)
    {
        // Mencari data lomba berdasarkan ID
        $lomba = Lomba::join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->with('feedback')
            ->where('tb_lomba.lomba_id', $idLomba)
            ->first();

        // Cek apakah data lomba ditemukan
        if (!$lomba) {
            return response()->json([
                'message' => 'Lomba tidak ditemukan',
            ], 404);
        }

        // Mengambil field names sebagai persyaratan
        // Mengambil label
        $dataForm = FormLomba::where('form_lomba', $lomba->lomba_id)->first();
        $dataLabel = json_decode($dataForm->form_content, true);

        $names = [];

        // Iterasi untuk mendapatkan nama hanya untuk field yang menerima input
        foreach ($dataLabel as $field) {
            if (isset($field['name']) && in_array($field['type'], ['text', 'email', 'number', 'date', 'select', 'checkbox-group', 'radio-group', 'file'])) {
                $names[$field['name']] = $field['label']; // Simpan name dan label untuk header kolom
            }
        }

        // Cek jika tanggal lomba sudah berlalu
        $tanggalSekarang = Carbon::now();
        $pesan = Carbon::parse($lomba->lomba_tanggal)->isPast()
            ? "Masa pendaftaran lomba ini sudah berakhir, silahkan ikuti lomba lain yang masih tersedia"
            : null;


        // Mengambil Jumlah yang telah terdaftar
        $partisipan = FormLomba::where('form_lomba', $lomba->lomba_id)->get()->count();

        return view('lomba.detail', compact('lomba', 'pesan', 'names', 'partisipan'));
    }

    public function showForm(string $id)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            // Jika user belum login, kirim pesan atau arahkan ke halaman login
            return redirect()->route('loginRoute')->withErrors(['message' => 'Anda perlu login terlebih dulu untuk melanjutkan.']);
        }

        $lomba = Lomba::where('lomba_id', $id)->first();
        $item = FormLomba::where('form_lomba', $lomba->lomba_id)->first();
        $formContent = $item->form_content;

        // Mengambil Data Peserta
        $getUserId = Auth::user()->user_id;
        $dataPeserta = Peserta::where('peserta_id', $getUserId)->first();

        // Decode JSON form content dari database menjadi array asosiatif
        $formData = json_decode($formContent, true);

        //dd($formData);

        // Tentukan fillable fields
        $fillableFields = [
            'peserta_nama',
            'peserta_gender',
            'peserta_tanggallahir',
            'peserta_pendidikan',
            'peserta_email',
            'peserta_telepon',
        ];

        // Memasukkan nilai peserta ke dalam formData
        $jawabanFormulir = [
            'peserta_nama' => $dataPeserta->peserta_nama,
            'peserta_gender' => $dataPeserta->peserta_gender,
            'peserta_tanggallahir' => $dataPeserta->peserta_tanggallahir,
            'peserta_pendidikan' => $dataPeserta->peserta_pendidikan,
            'peserta_email' => $dataPeserta->peserta_email,
            'peserta_telepon' => $dataPeserta->peserta_telepon,
        ];

        // Panggil fungsi untuk menyisipkan nilai
        $updatedFormData = $this->insertValuesIntoFormData($formData, $jawabanFormulir, $fillableFields);

        // // Encode kembali array asosiatif ke dalam JSON
        $item['form_content'] = json_encode($updatedFormData);
        // return dd($fillableFields);

        // // return dd($item, $lomba);
        return view('lomba.formulir', compact('lomba', 'item'));
    }

    protected function insertValuesIntoFormData($formData, $jawabanFormulir, $fillable)
    {
        // Iterasi melalui semua elemen formData untuk menyisipkan nilai dari jawabanFormulir
        foreach ($formData as &$field) {
            // Cek apakah elemen adalah array dan memiliki kunci 'name'
            if (is_array($field) && isset($field['name'])) {
                // Ambil nama dari field
                $name = $field['name'];

                // Cek apakah nama field ada dalam $fillable
                foreach ($fillable as $fillableField) {
                    // Jika nama field sama dengan nama input yang ada di $fillable
                    if ($fillableField == $name) {
                        // Ganti value field dengan nilai dari jawabanFormulir jika ada
                        $field['value'] = isset($jawabanFormulir[$fillableField]) ? $jawabanFormulir[$fillableField] : '';
                    }
                }
            }
        }

        // return $jawabanFormulir;
        return $formData;
    }
}
