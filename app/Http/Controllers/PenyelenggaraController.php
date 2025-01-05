<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\FormLomba;
use App\Models\JawabanForm;
use App\Models\Lomba;
use App\Models\Penyelenggara;
use App\Http\Requests\StorePenyelenggaraRequest;
use App\Http\Requests\UpdatePenyelenggaraRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenyelenggaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getUser = Auth::user();

        $dataPenyelenggara = Penyelenggara::where('penyelenggara_id', $getUser->user_id)->get()[0];

        // Dapatkan lomba yang masih berlangsung (batas pendaftaran besok atau lebih jauh)
        $lombaBerlangsung = Lomba::where('lomba_penyelenggara', $getUser->user_id)
            ->where('lomba_tanggal', '>=', \Carbon\Carbon::tomorrow())
            ->get();

        // Hitung total lomba yang masih terbuka
        $totalLomba = $lombaBerlangsung->count();

        // Hitung total lomba yang telah dibuat oleh penyelenggara
        $totalLombaAll = Lomba::where('lomba_penyelenggara', $getUser->user_id)->count();

        // Hitung total peserta yang telah mendaftar di seluruh lomba buatan penyelenggara
        $totalPeserta = JawabanForm::where('jawaban_penyelenggara', $getUser->user_id)->count();

        //  Halaman Index Penyelenggara
        return view('penyelenggara.index', compact('dataPenyelenggara', 'totalPeserta', 'totalLombaAll', 'lombaBerlangsung', 'totalLomba'));
    }

    public function listLomba(Request $request)
    {
        $getUserPenyelenggara = Auth::user()->user_id;

        // Ambil keyword dari input pencarian
        $keyword = $request->input('keyword');

        // Query dasar untuk lomba yang dibuat oleh penyelenggara
        $query = Lomba::where('lomba_penyelenggara', $getUserPenyelenggara);

        // Jika ada keyword, lakukan pencarian
        if ($keyword) {
            // Cek jika keyword cocok dengan nama lomba, kategori, atau tanggal
            $query->where(function ($q) use ($keyword) {
                $q->where('lomba_nama', 'like', '%' . $keyword . '%')
                    ->orWhere('lomba_kategori', 'like', '%' . $keyword . '%');

                // Mencoba mencocokkan tanggal
                $dateKeyword = strtotime($keyword);
                if ($dateKeyword) {
                    // Jika user hanya memasukkan bulan (misal "November"), default ke tahun sekarang
                    $monthYear = date('Y-m', $dateKeyword);

                    $q->orWhere('lomba_tanggal', 'like', $monthYear . '%');
                }
            });
        }

        // Ambil daftar lomba sesuai hasil query
        $listLomba = $query->get();

        // Jika pencarian kosong, ambil semua lomba yang dibuat penyelenggara
        $showAllLomba = false;
        if ($listLomba->isEmpty() && $keyword) {
            // Ambil semua lomba yang dibuat penyelenggara jika tidak ada yang cocok dengan pencarian
            $listLomba = Lomba::where('lomba_penyelenggara', $getUserPenyelenggara)->get();
            $showAllLomba = true;
        }

        // Hanya lomba yang masih terbuka untuk pendaftaran
        $listLombaterbuka = Lomba::where('lomba_penyelenggara', $getUserPenyelenggara)
            ->where('lomba_tanggal', '>=', \Carbon\Carbon::tomorrow())
            ->get();

        // Hitung total lomba
        $totalLomba = $listLombaterbuka->count();
        return view('penyelenggara.lomba', compact('listLomba', 'totalLomba', 'showAllLomba'));
    }

    public function detailLomba($id)
    {
        $getUser = Auth::user();
        /// Hitung jumlah lomba yang masih terbuka untuk pendaftaran
        $totalLomba = Lomba::where('lomba_penyelenggara', $getUser->user_id)
            ->where('lomba_tanggal', '>=', Carbon::tomorrow())
            ->count();


        $lomba = Lomba::where('lomba_id', $id)->get()[0];
        $dataJawaban = JawabanForm::where('jawaban_lomba', $lomba->lomba_id)->get();

        // Mengambil label
        $dataForm = FormLomba::where('form_lomba', $lomba->lomba_id)->get()[0];
        $dataLabel = json_decode($dataForm->form_content, true);

        $names = [];

        // Iterasi untuk mendapatkan nama hanya untuk field yang menerima input
        foreach ($dataLabel as $field) {
            if (isset($field['name']) && in_array($field['type'], ['text', 'email', 'number', 'date', 'select', 'checkbox-group', 'radio-group', 'file'])) {
                $names[$field['name']] = $field['label']; // Simpan name dan label untuk header kolom
            }
        }

        // Susun ulang jawaban peserta agar sesuai dengan urutan $names
        foreach ($dataJawaban as $jawaban) {
            $jawabanContent = json_decode($jawaban->jawaban_content, true);

            // Debugging: Lihat isi jawabanContent
            // dd($jawabanContent);

            // Susun ulang jawaban_content sesuai dengan urutan nama kolom di $names
            $orderedJawabanContent = [];
            foreach (array_keys($names) as $name) {
                if (isset($jawabanContent[$name])) {
                    // Jika jawaban adalah array, simpan hasil yang digabung dengan koma
                    if (is_array($jawabanContent[$name])) {
                        $orderedJawabanContent[$name] = implode(', ', $jawabanContent[$name]);
                    } else {
                        $orderedJawabanContent[$name] = $jawabanContent[$name];
                    }
                } else {
                    // Jika tidak ada data yang sesuai, isi dengan tanda "-"
                    $orderedJawabanContent[$name] = '-';
                }
            }


            // Replace jawaban_content dengan yang sudah diurutkan
            $jawaban['jawaban_content'] = $orderedJawabanContent;
        }
        return view('penyelenggara.detail-lomba', compact('lomba', 'names', 'dataJawaban', 'totalLomba'));
    }

    public function showForm()
    {
        $getUser = Auth::user();
        // Hitung jumlah lomba terbuka yang dimiliki penyelenggara
        $totalLomba = Lomba::where('lomba_penyelenggara', $getUser->user_id)
            ->where('lomba_tanggal', '>=', Carbon::tomorrow())
            ->count();
        return view('penyelenggara.formLomba.create', compact('totalLomba'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function createLomba()
    {
        $getUser = Auth::user();
        // Hitung jumlah lomba yang dimiliki penyelenggara
        $totalLomba = Lomba::where('lomba_penyelenggara', $getUser->user_id)
            ->where('lomba_tanggal', '>=', Carbon::tomorrow())
            ->count();
        return view('penyelenggara.create-lomba', compact('totalLomba'));
    }

    public function storeLomba(Request $request)
    {
        $customMessages = [
            'required' => ':attribute harus terisi.',
            'min' => ':attribute minimal :min karakter.',
            'date_format' => ':attribute tidak valid',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus jpeg, png, jpg',
            'max' => ':attribute minimal berukuran 2MB',
            'date.after' => ':attribute minimal hari ini.',
        ];

        $validateDataLomba = $request->validate(
            [
                'nama' => 'required|min:5',
                'category' => 'required',
                'date' => [
                    'required',
                    'date_format:d-m-Y',
                    'after:' . Carbon::today()->format('d-m-Y')
                ],
                'capacity' => 'required|numeric|min:1',
                'lokasi' => 'required',
                'jenjang' => 'required',
                'desc' => 'required',
                'poster-lomba' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            $customMessages,
            [
                'nama' => 'Nama Lomba',
                'category' => 'Kategori',
                'date' => 'Tanggal Lomba',
                'capacity' => 'Kapasitas',
                'lokasi' => 'Lokasi',
                'desc' => 'Deskripsi',
                'jenjang' => 'Jenjang Peserta',
                'poster-lomba' => 'Poster Lomba',
            ]
        );

        if (!$validateDataLomba) {
            return back()->withErrors($validateDataLomba);
        }

        // Generate nama file yang unik
        $image = $request->file('poster-lomba'); // Ambil file gambar
        $timestamp = Carbon::now()->format('YmdHis'); // Waktu detail (tahun, bulan, hari, jam, menit, detik)
        $imageName = str_replace(' ', '_', strtolower($request->name)) . '_' . $timestamp . '.' . $image->getClientOriginalExtension();

        // Cek apakah file dengan nama yang sama sudah ada di public storage
        if (file_exists(public_path('images/' . $imageName)) || Lomba::where('lomba_poster', $imageName)->exists()) {
            return back()->withErrors(['poster-lomba' => 'Coba lagi dalam beberapa saat.']);
        }

        // Pindahkan file ke folder 'images'
        $image->move(public_path('images'), $imageName);

        // Pemisahan data
        $dataLomba = [
            'lomba_nama' => $request->nama,
            'lomba_kategori' => $request->category,
            'lomba_tanggal' => Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'),
            'lomba_kapasitas' => $request->capacity,
            'lomba_lokasi' => $request->lokasi,
            'lomba_jenjang' => $request->jenjang,
            'lomba_deskripsi' => $request->desc,
            'lomba_poster' => $imageName, // Simpan nama file yang unik
        ];

        session()->put('dataLomba', $dataLomba);
        return redirect()->route('pylCreateFormRoute');
    }

    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenyelenggaraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyelenggara $penyelenggara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyelenggara $penyelenggara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyelenggaraRequest $request, Penyelenggara $penyelenggara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyelenggara $penyelenggara)
    {
        //
    }
}
