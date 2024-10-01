<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Sesuaikan dengan nama view form login Anda
    }


    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencoba melakukan autentikasi berdasarkan username dan password
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, cek tipe rule (peserta atau penyelenggara)
            $user = Auth::user();
            
            if ($user->rule === 'peserta') {
                dd('Sebagai peserta');
            } elseif ($user->rule === 'penyelenggara') {
                // Redirect ke dashboard penyelenggara atau halaman yang sesuai
                dd('Sebagai penyelenggara');
                // return redirect()->intended('/penyelenggara-dashboard');
            }
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password Anda salah.',
        ])->onlyInput('username');
    }

}
