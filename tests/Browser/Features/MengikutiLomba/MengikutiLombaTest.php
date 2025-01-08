<?php

namespace Tests\Browser\Features\MengikutiLomba;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengikutiLombaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

    //  
    public function test_001_peserta_join_lomba_success(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/2/detail/formulir');

            $browser->press('Daftar');
            // $browser->assertPathIs('/peserta');
            $browser->screenshot('/join-lomba/TC_JOINLOMBA_001_RESULT');
        });
    }
}
