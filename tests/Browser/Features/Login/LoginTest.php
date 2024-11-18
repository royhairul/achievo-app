<?php

namespace Tests\Browser\Login;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    // Universal Test Login
    public function test_login_empty_username_and_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('username', null)
                ->type('password', null)
                ->press('Masuk');
            $browser->screenshot(__FUNCTION__ . '_test');
        });
    }

    public function test_login_only_username(): void
    {
        $user = User::role('peserta')->first();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', null)
                ->press('Masuk');
            $browser->screenshot('test_login_only_username');
        });
    }

    public function test_login_only_password(): void
    {
        $user = User::role('peserta')->first();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', null)
                ->type('password', $user->password)
                ->press('Masuk');
            $browser->screenshot('test_login_only_password');
        });
    }

    public function test_peserta_cannot_login_invalid_username(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('peserta')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', 'santoso_budi')
                ->type('password', 'password123')
                ->press('Masuk');
            $browser->screenshot('test_peserta_login_invalid_username');
        });
    }

    public function test_peserta_cannot_login_invalid_password(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('peserta')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', 'passwordsalah')
                ->press('Masuk');
            $browser->screenshot('test_peserta_login_invalid_password');
        });
    }

    public function test_peserta_cannot_login_invalid_username_and_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('username', 'usernamesalah')
                ->type('password', 'passwordsalah')
                ->press('Masuk');
            $browser->screenshot('test_peserta_login_invalid_username_and_password');
        });
    }

    /**
     * Validasi Login.
     */
    public function test_peserta_can_login_and_redirect_to_dashboard(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('peserta')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->assertPathIs('/peserta');
            $browser->screenshot('test_peserta_login_valid_and_redirect_to_dashboard');
        });
    }

    public function test_penyelenggara_cannot_login_invalid_username(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('penyelenggara')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', 'santoso_budi')
                ->type('password', 'password123')
                ->press('Masuk');
            $browser->screenshot('test_penyelenggara_login_invalid_username');
        });
    }

    public function test_penyelenggara_cannot_login_invalid_password(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('penyelenggara')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', 'passwordsalah')
                ->press('Masuk');
            $browser->screenshot('test_penyelenggara_login_invalid_password');
        });
    }

    public function test_penyelenggara_cannot_login_invalid_username_and_password(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('username', 'usernamesalah')
                ->type('password', 'passwordsalah')
                ->press('Masuk');
            $browser->screenshot('test_penyelenggara_login_invalid_username_and_password');
        });
    }

    /**
     * Validasi Login.
     */
    public function test_penyelenggara_can_login_and_redirect_to_dashboard(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = User::role('penyelenggara')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', 'password123')
                ->press('Masuk')
                ->assertPathIs('/penyelenggara');
            $browser->screenshot('test_penyelenggara_login_valid_and_redirect_to_dashboard');
        });
    }
}
