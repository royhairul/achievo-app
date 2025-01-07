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
}
