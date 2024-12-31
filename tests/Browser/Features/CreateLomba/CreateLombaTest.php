<?php

namespace Tests\Browser\Features\CreateLomba;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateLombaTest extends DuskTestCase
{

    protected $tablesToTruncate = ['tb_form'];

    public function generateImages()
    {
        Storage::fake('test'); // Create a temporary storage disk for testing

        // Valid image (JPEG)
        $validImage = UploadedFile::fake()->image('valid-image.jpg', 600, 600)->size(100);
        $validImagePath = storage_path('app/public/') . $validImage->getClientOriginalName();
        file_put_contents($validImagePath, $validImage->get());

        // Invalid format image (TXT)
        $invalidFormatImage = UploadedFile::fake()->create('invalid-image.txt', 100);
        $invalidFormatImagePath = storage_path('app/public/') . $invalidFormatImage->getClientOriginalName();
        file_put_contents($invalidFormatImagePath, $invalidFormatImage->get());

        // Large image (5MB)
        $bigImage = UploadedFile::fake()->image('big-image.jpg', 1200, 1200)->size(5000); // 5MB
        $bigImagePath = storage_path('app/public/') . $bigImage->getClientOriginalName();
        file_put_contents($bigImagePath, $bigImage->get());

        // Return all images as an array
        return [
            'validImage' => $validImagePath,
            'invalidFormatImage' => $invalidFormatImagePath,
            'bigImage' => $bigImagePath
        ];
    }


    /**
     * A Dusk test example.
     */

    //  TC_CREATELOMBA_001
    public function test_001_penyelenggara_create_lomba_success(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', now()->addDays(2)->format('d-m-Y'))
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->assertPathIs('/penyelenggara/lomba/formulir/create');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_001_RESULT');
        });
    }

    // TC_CREATELOMBA_002
    public function test_002_penyelenggara_create_lomba_invalid_name(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'ABC')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', Carbon::today()->format('d-m-Y'))
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_002_RESULT');
        });
    }

    // TC_CREATELOMBA_003
    public function test_003_penyelenggara_create_lomba_invalid_date_yesterday(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', Carbon::yesterday()->format('d-m-Y')) // Tanggal Kemarin
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_003_RESULT');
        });
    }

    // TC_CREATELOMBA_004
    public function test_004_penyelenggara_create_lomba_empty_category(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', null)
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', Carbon::today()->format('d-m-Y')) // Tanggal Kemarin
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_004_RESULT');
        });
    }

    // TC_CREATELOMBA_005
    public function test_005_penyelenggara_create_lomba_invalid_capacity(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', -1) // Capacity negative (invalid)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', now()->addDays(2)->format('d-m-Y'))
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_005_RESULT');
        });
    }

    // TC_CREATELOMBA_006
    public function test_006_penyelenggara_create_lomba_empty_lokasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', '') // Empty lokasi
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', now()->addDays(2)->format('d-m-Y'))
                ->attach('poster-lomba', $this->generateImages()['validImage']);

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_006_RESULT');
        });
    }

    // TC_CREATELOMBA_007
    public function test_007_penyelenggara_create_lomba_invalid_image_format(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', now()->addDays(2)->format('d-m-Y'))
                ->attach('poster-lomba', $this->generateImages()['invalidFormatImage']); // Invalid file format

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_007_RESULT');
        });
    }

    // TC_CREATELOMBA_008
    public function test_008_penyelenggara_create_lomba_success_without_poster(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/penyelenggara/lomba/create')
                ->type('nama', 'Lomba Sains 2024')
                ->select('category', 'Akademik')
                ->type('lokasi', 'Rogojampi, Banyuwangi')
                ->type('capacity', 12)
                ->type('desc', "Lomba sains antar sekolah untuk tingkat nasional.")
                ->value('#date', now()->addDays(2)->format('d-m-Y'));

            $browser->press('Buat Lomba');
            $browser->screenshot('/create-lomba/TC_CREATELOMBA_008_RESULT');
        });
    }

}
