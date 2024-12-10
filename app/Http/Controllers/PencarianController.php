<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
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
    public function search(Request $request)
    {
        $keyword = $request->input('cari');
        $daftarLomba = Lomba::
            join('tb_penyelenggara', 'tb_lomba.lomba_penyelenggara', '=', 'tb_penyelenggara.penyelenggara_id')
            ->select('tb_lomba.*', 'penyelenggara_nama')
            ->get();

        // return dd($daftarLomba);
        // Menampilkan hasil ke view
        return view('pencarian', compact('keyword', 'daftarLomba'));
    }
}
