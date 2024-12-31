<?php

namespace Tests\Browser\Register;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class RegisterPesertaTest extends DuskTestCase
{
    protected $tablesToTruncate = ['users', 'tb_peserta'];

    // TC_REGISTER_001
    public function test_register_peserta_success(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Periksa melakukan redirect ke halaman login
            $browser->assertPathIs('/login');

            // Mengambil screenshot setelah submit
            $browser->screenshot('register/TC_REGISTER_001__RESULT');
        });
    }

    // TC_REGISTER_002
    public function test_register_peserta_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', null)
                ->select('gender', null)
                ->select('study', null)
                ->type('email', null)
                ->type('phone', null)
                ->type('username', null)
                ->type('password', null);

            // Pengisian Tanggal
            $browser->type('birthdate', null)
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Nama Lengkap harus terisi.');
            $browser->assertSee('Jenis Kelamin harus terisi.');
            $browser->assertSee('Pendidikan harus terisi.');
            $browser->assertSee('Email harus terisi.');
            $browser->assertSee('Nomor Telepon harus terisi.');
            $browser->assertSee('Username harus terisi.');
            $browser->assertSee('Kata Sandi harus terisi.');
            $browser->assertSee('Tanggal Lahir harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_002__RESULT');
        });
    }

    // TC_REGISTER_003
    public function test_register_peserta_birthdate_min_5_year(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            $invalidDate = now()->subYears(5)->addDays()->format('d-m-Y'); // Ambil tanggal 5 tahun kurang 1 hari
            // Pengisian Tanggal
            $browser->type('birthdate', $invalidDate) // Menggunakan tanggal yang dihasilkan di atas
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Umur minimal 5 tahun.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_003__RESULT');
        });
    }

    // TC_REGISTER_004
    public function test_register_peserta_birthdate_max_80_year(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '29-10-1944') // Masukkan nilai lebih dari 80 tahun
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Umur maksimal 80 tahun.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_004__RESULT');
        });
    }

    // TC_REGISTER_005
    public function test_register_peserta_empty_field_name(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', null)
                ->select('study', 'SMA')
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Nama Lengkap harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_005__RESULT');
        });
    }

    // TC_REGISTER_006
    public function test_register_peserta_empty_gender(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', null)
                ->select('study', 'SMA')
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Jenis Kelamin harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_006__RESULT');
        });
    }

    // TC_REGISTER_007
    public function test_register_peserta_empty_pendidikan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', null)
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Pendidikan harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_007__RESULT');
        });
    }

    // TC_REGISTER_008
    public function test_register_peserta_empty_email(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', null)
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Email harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_008__RESULT');
        });
    }

    // TC_REGISTER_009
    public function test_register_peserta_empty_username(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', null)
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Username harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_009__RESULT');
        });
    }

    // TC_REGISTER_010
    public function test_register_peserta_empty_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', null);

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Kata Sandi harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_010__RESULT');
        });
    }

    // TC_REGISTER_011
    public function test_register_peserta_empty_phone(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', null)
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '05-11-1988')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Nomor Telepon harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_011__RESULT');
        });
    }

    // TC_REGISTER_012
    public function test_register_peserta_empty_birthdate(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'Joko Santoso')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', null)
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Menambahkan pemeriksaan pesan error
            $browser->assertSee('Tanggal Lahir harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_012__RESULT');
        });
    }
}