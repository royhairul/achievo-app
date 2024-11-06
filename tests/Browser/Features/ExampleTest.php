<?php

namespace Tests\Browser\Features;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_peserta_can_login_and_redirect_to_dashboard(): void
    {
        // Ambil user dari database yang telah dibuat oleh seeder
        $user = \App\Models\User::role('peserta')->first();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('username', $user->username)
                ->type('password', 'password123');
            // Pengambilan screenshot sebelum submit
            $browser->screenshot(__FUNCTION__ . '_before_submit')
                ->press('Masuk')
                ->assertPathIs('/peserta');
            $browser->screenshot(__FUNCTION__ . '_after_submit');
        });
    }
}
