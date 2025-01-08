<?php

namespace Tests\Browser\Features\ManajemenPrestasi;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;

class ManajemenPrestasiTest extends DuskTestCase
{
    protected $tablesToTruncate = ['tb_prestasi'];

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

    //  TC_ADDPRESTASI_001
    public function test_001_add_prestasi_success(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->assertPathIs('/peserta/prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_001_RESULT');
        });
    }

    // TC_ADDPRESTASI_002 - Invalid name empty
    public function test_002_add_prestasi_name_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', '')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_002_RESULT');
        });
    }

    // TC_ADDPRESTASI_003 - Invalid penyelenggara empty
    public function test_003_add_prestasi_penyelenggara_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', '') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_003_RESULT');
        });
    }

    // TC_ADDPRESTASI_004 - Invalid tanggal empty
    public function test_004_add_prestasi_tanggal_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', '') // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_004_RESULT');
        });
    }

    // TC_ADDPRESTASI_005 - Invalid tanggal format tomorrow
    public function test_005_add_prestasi_tanggal_invalid_tomorrow(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->addDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_005_RESULT');
        });
    }

    // TC_ADDPRESTASI_006 - Invalid nomor empty
    public function test_006_add_prestasi_nomor_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', '') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_006_RESULT');
        });
    }

    // TC_ADDPRESTASI_007 - Invalid nominasi empty
    public function test_007_add_prestasi_nominasi_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', '')
                ->attach('sertifikat', $this->generateImages()['validImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_007_RESULT');
        });
    }

    // TC_ADDPRESTASI_008 - Invalid sertifikat empty
    public function test_008_add_prestasi_sertifikat_invalid_empty(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan');
                // ->attach('sertifikat', null);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_008_RESULT');
        });
    }

    // TC_ADDPRESTASI_009 - Invalid sertifikat format txt
    public function test_009_add_prestasi_sertifikat_invalid_format_txt(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['invalidFormatImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_009_RESULT');
        });
    }

    // TC_ADDPRESTASI_010 - Invalid sertifikat size 5MB
    public function test_010_add_prestasi_sertifikat_invalid_size_5mb(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('rule', 'peserta')->first())
                ->visit('/peserta/prestasi/create')
                ->type('nama', 'Lomba Sains 2024')
                ->type('penyelenggara', 'Kementrian Pendidikan dan Kebudayaan') // Pengisian Tanggal
                ->type('tanggal', today()->subDay()->format('d-m-Y')) // Pengisian Tanggal
                ->select('kategori', 'Akademik')
                ->type('nomor', 'INST-XYZ-2025/0045') // Nomor sertifikat
                ->select('nominasi', 'Partisipan')
                ->attach('sertifikat', $this->generateImages()['bigImage']);

            $browser->press('Tambah Prestasi');
            $browser->screenshot('/prestasi/TC_PRESTASI_010_RESULT');
        });
    }
}
