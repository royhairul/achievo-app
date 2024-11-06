<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Carbon;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterPenyelenggaraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_025__RESULT');
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_026__RESULT');
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_027__RESULT');
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_026__RESULT');
        });
    }

    // TC_REGISTER_29
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_029__RESULT');
        });
    }

    // TC_REGISTER_30
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_030__RESULT');
        });
    }

    // TC_REGISTER_31
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_031__RESULT');
        });
    }

    //  TC_REGISTER_024
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

            // Mengambil Screenshot
            $browser->screenshot('TC_REGISTER_024__RESULT');
        });
    }
}
