<?php

namespace Database\Seeders;

use App\Models\FormLomba;
use App\Models\Penyelenggara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LombaFormulirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormLomba::create([
            'form_penyelenggara' => Penyelenggara::first(),
        ]);
    }
}
