<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Peserta;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register peserta.
     *
     * @return \Illuminate\View\View
     */
    public function showFormPeserta()
    {
        return view('register.peserta'); // Sesuaikan dengan nama view form login Anda
    }

    /**
     * Menangani proses registrasi peserta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPeserta(Request $request)
    {
        // Validasi input
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'birthdate' => 'required|date_format:d-m-Y',
            'study' => 'required|string|in:SD,SMP,SMA,PT',
            'email' => 'required|email|unique:tb_peserta,peserta_email|unique:users,email',
            'phone' => 'required|string|max:20',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        // Membuat data peserta baru
        $peserta = Peserta::create([
            'peserta_nama' => $request->fullname,
            'peserta_gender' => $request->gender,
            'peserta_tanggallahir' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d'),
            'peserta_pendidikan' => $request->study,
            'peserta_email' => $request->email,
            'peserta_telepon' => $request->phone,
        ]);

        // Membuat akun pengguna baru untuk peserta
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'rule' => 'peserta', // Menandai pengguna ini sebagai peserta
            'user_ref_id' => $peserta->peserta_id, // Menyimpan ID peserta
            'remember_token' => Str::random(10),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
