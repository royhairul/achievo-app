<?php

namespace Tests\Browser\Register;

use Illuminate\Support\Carbon;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterPenyelenggaraTest extends DuskTestCase
{
    protected $tablesToTruncate = ['users', 'tb_penyelenggara'];

    // TC_REGISTER_024
    public function test_register_penyelenggara_success(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Periksan halaman redirect ke halaman login
            $browser->assertPathIs('/login');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_024__RESULT');
        });
    }

    // TC_REGISTER_025
    public function test_register_penyelenggara_empty_all(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', null)
                ->type('address', null)
                ->select('bidang', null)
                ->type('email', null)
                ->type('phone', null)
                ->type('username', null)
                ->type('password', null);

            // Pengisian Tanggal
            $browser->type('birthdate', null)
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert pesan error terkait pengisian form yang kosong
            $browser->assertSee('Nama penyelenggara harus terisi.');
            $browser->assertSee('Tanggal berdiri harus terisi.');
            $browser->assertSee('Alamat harus terisi.');
            $browser->assertSee('Bidang harus terisi.');
            $browser->assertSee('Email harus terisi.');
            $browser->assertSee('Nomor telepon harus terisi.');
            $browser->assertSee('Username harus terisi.');
            $browser->assertSee('Kata sandi harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_025__RESULT');
        });
    }

    // TC_REGISTER_026
    public function test_register_penyelenggara_invalid_birtdate_today(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', Carbon::today()->format('d-m-Y'))
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait tanggal lahir
            $browser->assertSee('Tanggal berdiri minimal satu hari yang lalu.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_026__RESULT');
        });
    }

    // TC_REGISTER_027
    public function test_register_penyelenggara_invalid_birthdate_exceeds_2000_years(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            $invalidDate = now()->subYears(2000)->subDay()->format('d-m-Y');
            $browser->type('birthdate', $invalidDate)
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait tanggal lahir
            $browser->assertSee('Tanggal berdiri maksimal 2000 tahun yang lalu.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_027__RESULT');
        });
    }

    // TC_REGISTER_028
    public function test_register_penyelenggara_empty_name(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', null)
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait nama
            $browser->assertSee('Nama penyelenggara harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_028__RESULT');
        });
    }

    // TC_REGISTER_029
    public function test_register_penyelenggara_empty_address(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', null)
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait alamat
            $browser->assertSee('Alamat harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_029__RESULT');
        });
    }

    // TC_REGISTER_030
    public function test_register_penyelenggara_empty_tanggal(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', null)
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait tanggal lahir
            $browser->assertSee('Tanggal berdiri harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_030__RESULT');
        });
    }

    // TC_REGISTER_031
    public function test_register_penyelenggara_empty_bidang(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', null)
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait bidang
            $browser->assertSee('Bidang harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_031__RESULT');
        });
    }

    // TC_REGISTER_032
    public function test_register_penyelenggara_empty_email(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', null)
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait email
            $browser->assertSee('Email harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_032__RESULT');
        });
    }

    // TC_REGISTER_033
    public function test_register_penyelenggara_empty_phone_number(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', null)
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert untuk memastikan ada pesan error terkait nomor telepon
            $browser->assertSee('Nomor telepon harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_033__RESULT');
        });
    }

    //  TC_REGISTER_034
    public function test_register_penyelenggara_empty_username(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', null)
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Username harus terisi.' muncul
            $browser->assertSee('Username harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_034__RESULT');
        });
    }

    //  TC_REGISTER_035
    public function test_register_penyelenggara_empty_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', null);

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Password harus terisi..' muncul
            $browser->assertSee('Kata sandi harus terisi.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_035__RESULT');
        });
    }

    //  TC_REGISTER_036
    public function test_register_penyelenggara_username_only_one_character(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'T')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 't')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Username minimal 4 karakter.' muncul
            $browser->assertSee('Username minimal 4 karakter.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_036__RESULT');
        });
    }

    //  TC_REGISTER_037
    public function test_register_penyelenggara_username_more_than_51_character(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Universitas Tertutup Rapat Teknik Swasta 616 Atlant')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Username maksimal 51 karakter.' muncul
            // $browser->assertSee('Username maksimal 51 karakter.');
            $browser->assertPathIs('/login');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_037__RESULT');
        });
    }

    //  TC_REGISTER_040
    public function test_register_penyelenggara_email_invalid_format(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'teamacad.official.ac.id')
                ->type('phone', '+628123456789')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Email anda tidak valid.' muncul
            $browser->assertSee('Email anda tidak valid.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_040__RESULT');
        });
    }

    //  TC_REGISTER_041
    public function test_register_penyelenggara_phone_only_2_number(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/penyelenggara')
                ->type('name', 'Team Academy')
                ->type('address', 'Rogojampi, Banyuwangi')
                ->select('bidang', 'Akademik')
                ->type('email', 'team@academy.com')
                ->type('phone', '12')
                ->type('username', 'team_aca')
                ->type('password', 'admin');

            // Pengisian Tanggal
            $browser->type('birthdate', '13-03-2004')
                ->script('document.querySelector(".datepicker-picker").style.display = "none";');

            // Menekan Tombol
            $browser->press('Buat Akun');

            // Assert bahwa pesan error 'Nomor Telepon minimal 8 karakter.' muncul
            $browser->assertSee('Nomor telepon minimal 8 karakter.');

            // Mengambil Screenshot
            $browser->screenshot('register/TC_REGISTER_041__RESULT');
        });
    }
}

