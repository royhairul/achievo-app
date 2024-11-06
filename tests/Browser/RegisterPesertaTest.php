<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class RegisterPesertaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

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

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty');
        });
    }

    public function test_register_peserta_birthdate_min_5_year(): void
    {
        $faker = Faker::create();
        $this->browse(function (Browser $browser) use ($faker) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');


            // Pengisian Tanggal-
            $browser->type('birthdate', '01-11-2019') // Masukkan nilai 5 tahun kurang 1 hari
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_birthdate_min_5_year');
        });
    }

    public function test_register_peserta_birthdate_max_80_year(): void
    {
        $faker = Faker::create();
        $this->browse(function (Browser $browser) use ($faker) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');


            // Pengisian Tanggal-
            $browser->type('birthdate', '29-10-1944') // Masukkan nilai 5 tahun kurang 1 hari
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_birthdate_max_80_year');
        });
    }

    public function test_register_peserta_empty_field_name(): void
    {
        $faker = Faker::create();
        $this->browse(function (Browser $browser) use ($faker) {
            $browser->visit('/register/peserta')
                ->type('name', null)
                ->select('study', 'SMA')
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal-
            $browser->type('birthdate', '13-03-2004') // Masukkan nilai 5 tahun kurang 1 hari
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_field_name');
        });
    }

    public function test_register_peserta_empty_gender(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', null)
                ->select('study', 'SMA')
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_gender');
        });
    }

    public function test_register_peserta_empty_pendidikan(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', null)
                ->type('email', 'john@example.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_pendidikan');
        });
    }
    public function test_register_peserta_empty_email(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', null)
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_email');
        });
    }
    public function test_register_peserta_empty_username(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', null)
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_username');
        });
    }
    public function test_register_peserta_empty_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', null);

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_password');
        });
    }
    public function test_register_peserta_empty_phone(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', null)
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_phone');
        });
    }
    public function test_register_peserta_empty_birthdate(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
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

            // Mengambil Screenshot
            $browser->screenshot('test_register_peserta_empty_birthdate');
        });
    }
    public function tc_register_001(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/peserta')
                ->type('name', 'John Doe')
                ->select('gender', 'Pria')
                ->select('study', 'SMA')
                ->type('email', 'john@dot.com')
                ->type('phone', '+628123456789')
                ->type('username', 'johndoe')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Pengambilan screenshot sebelum submit
            $browser->screenshot('test_register_peserta_success');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Mengambil screenshot setelah submit
            $browser->screenshot('test_register_peserta_success');
        });
    }
}
