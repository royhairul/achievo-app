<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\TestCase as BaseTestCase;
use PHPUnit\Framework\Attributes\BeforeClass;

abstract class DuskTestCase extends BaseTestCase
{
    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        if (!static::runningInSail()) {
            static::startChromeDriver(['--port=9515']);
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments(collect([
            // Memulai Chrome dalam mode maksimal jika diinginkan, jika tidak, atur ukuran jendela.
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1366,768',

            // Menonaktifkan layar pilihan mesin pencari.
            '--disable-search-engine-choice-screen',

            // Menonaktifkan penyimpanan cache untuk mencegah data yang tidak diinginkan.
            '--disable-application-cache',

            // Menonaktifkan pengaturan yang tidak perlu.
            '--no-sandbox',

            // Menonaktifkan perangkat keras akselerasi, jika tidak menggunakan mode headless.
            '--disable-gpu',

            // Menjalankan browser di background untuk menghemat sumber daya.
            '--headless=new',

            // Menggunakan profil default untuk menghindari masalah dengan pengaturan pengguna.
            '--user-data-dir=' . sys_get_temp_dir(),
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge([
                // Menambahkan opsi headless jika diinginkan.
                '--headless=new',
            ]);
        })->all());

        // Mengembalikan RemoteWebDriver dengan URL dan opsi yang telah diset.
        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? env('DUSK_DRIVER_URL') ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
    }
}
