<?php

namespace App\Http\Controllers;

use App\Models\Penyelenggara;
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
     * Menampilkan halaman register penyelenggara.
     *
     * @return \Illuminate\View\View
     */
    public function showFormPenyelenggara()
    {
        return view('register.penyelenggara'); // Sesuaikan dengan nama view form login Anda
    }

    /**
     * Menangani proses registrasi peserta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPeserta(Request $request)
    {
        $customMessages = [
            'required' => ':attribute harus terisi.',
            'min' => ':attribute minimal :min karakter.',
            'email' => ':attribute anda tidak valid.',
            'phone.regex' => ':attribute tidak valid.',
            'username.unique' => ':attribute sudah digunakan',
        ];

        // Validasi input
        $validateDataPeserta = $request->validate(
            [
                'name' => 'required|min:3',
                'gender' => 'required',
                'birthdate' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        // Memvalidasi apakah tanggal minimal 5 tahun yang lalu
                        if (\Carbon\Carbon::parse($value)->isAfter(\Carbon\Carbon::now()->subYears(5))) {
                            $fail('Umur minimal 5 tahun.');
                        }if (\Carbon\Carbon::parse($value)->isBefore(\Carbon\Carbon::now()->subYears(80))) {
                            $fail('Umur maksimal 80 tahun.');
                        }
                    },
                ],
                'study' => 'required',
                'email' => 'required|email|unique:tb_peserta,peserta_email',
                'phone' => ['required', 'regex:/^(\+62|62|0)8[1-9][0-9]{6,10}$/'],
                'username' => 'required|min:4|unique:users,username',
                'password' => 'required|min:4',
            ],
            $customMessages,
            [
                'name' => 'Nama Lengkap',
                'gender' => 'Jenis Kelamin',
                'birthdate' => 'Tanggal Lahir',
                'study' => 'Pendidikan',
                'email' => 'Email',
                'phone' => 'Nomor Telepon',
                'username' => 'Username',
                'password' => 'Kata Sandi',
            ]
        );

        // Jika Gagal Validasi
        if (!$validateDataPeserta) {
            return back()->withErrors($validateDataPeserta);
        }

        // Pemisahan Data
        $dataPeserta = [
            'peserta_nama' => $request->name,
            'peserta_gender' => $request->gender,
            'peserta_tanggallahir' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d'),
            'peserta_pendidikan' => $request->study,
            'peserta_email' => $request->email,
            'peserta_telepon' => $request->phone,
        ];


        // Menyimpan ke dalam Database
        $dbPeserta = Peserta::firstOrCreate($dataPeserta);

        if ($dbPeserta) {
            $dataAkunPeserta = [
                'username' => $request->username,
                'password' => $request->password,
                'user_id' => $dbPeserta->peserta_id,
                'rule' => 'peserta', // Menandai pengguna ini sebagai peserta Menyimpan ID peserta
                'remember_token' => Str::random(10)
            ];

            $dbAkun = User::create($dataAkunPeserta)->assignRole('peserta');
        }

        return redirect()->route('loginRoute');
    }

    /**
     * Menangani proses registrasi peserta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPenyelenggara(Request $request)
    {
        $customMessages = [
            'required' => ':attribute harus terisi.',
            'email' => ':attribute anda tidak valid.',
            'min' => ':attribute minimal :min karakter.',
            'phone.numeric' => ':attribute harus berupa angka.',
            'username.unique' => ':attribute sudah digunakan',
        ];

        // Validasi input
        $validateDataPenyelenggara = $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'birthdate' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        if (\Carbon\Carbon::parse($value)->isAfter(\Carbon\Carbon::yesterday())) {
                            $fail('Tanggal berdiri minimal satu hari yang lalu.');
                        }
                        if (\Carbon\Carbon::parse($value)->isBefore(\Carbon\Carbon::now()->subYears(2000))) {
                            $fail('Tanggal berdiri maksimal 2000 tahun yang lalu.');
                        }
                    },
                ],
                'bidang' => 'required',
                'email' => 'required|email|unique:tb_penyelenggara,penyelenggara_email',
                'phone' => 'required|numeric',
                'username' => 'required|min:4|unique:users,username',
                'password' => 'required|min:4',
            ],
            $customMessages,
            [
                'name' => 'Nama Penyelenggara',
                'address' => 'Alamat',
                'birthdate' => 'Tanggal Berdiri',
                'bidang' => 'Bidang',
                'email' => 'Email',
                'phone' => 'Nomor Telepon',
                'username' => 'Username',
                'password' => 'Kata Sandi',
            ]
        );

        // Pemisahan Data
        $dataPenyelenggara = [
            'penyelenggara_nama' => $request->name,
            'penyelenggara_alamat' => $request->address,
            'penyelenggara_tahunberdiri' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthdate)->format('Y-m-d'),
            'penyelenggara_bidang' => $request->bidang,
            'penyelenggara_email' => $request->email,
            'penyelenggara_telepon' => $request->phone,
        ];

        // Menyimpan ke dalam Database
        $dbPenyelenggara = Penyelenggara::firstOrCreate($dataPenyelenggara);

        if ($dbPenyelenggara) {
            $dataAkunPenyelenggara = [
                'username' => $request->username,
                'password' => bcrypt($request->password), // Enkripsi password
                'user_id' => $dbPenyelenggara->penyelenggara_id,
                'rule' => 'penyelenggara', // Menandai pengguna ini sebagai penyelenggara
                'remember_token' => Str::random(10)
            ];

            // Simpan akun penyelenggara dan tambahkan peran
            $dbAkun = User::create($dataAkunPenyelenggara)->assignRole('penyelenggara');
        }

        return redirect()->route('loginRoute');
    }
}
