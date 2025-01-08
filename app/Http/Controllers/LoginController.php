<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Menampilkan Halaman Formulir Login
        return view('login');
    }


    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $customMessages = [
            'required' => ':attribute harus terisi.'
        ];

        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], $customMessages);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Simpan informasi user dalam session
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek tipe rule (peserta atau penyelenggara)
            if ($user->hasRole('penyelenggara')) {
                notify()->success('Welcome to Penyelenggara Lomba! 🎖️', 'Berhasil Login');
                return redirect()->route('penyelenggaraIndexRoute');
            } else {
                notify()->success('Welcome to Peserta Lomba! ⚡️', 'Berhasil Login');
                return redirect()->route('pesertaIndexRoute');
            }
        } else {
            // Cek apakah username ada di database
            $user = User::where('username', $request->input('username'))->first();

            // Jika user ditemukan, berarti password salah
            if ($user) {
                return back()->withErrors([
                    'password' => 'Password Anda salah.',
                ])->onlyInput('username');
            } else {
                // Jika user tidak ditemukan, berarti username salah
                return back()->withErrors([
                    'username' => 'Username tidak ditemukan.',
                ])->onlyInput('username');
            }
        }
    }


    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginRoute');
    }
}
