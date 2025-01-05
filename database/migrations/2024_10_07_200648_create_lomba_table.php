<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_lomba', function (Blueprint $table) {
            $table->id('lomba_id');
            $table->string('lomba_nama'); // Nama lomba
            $table->string('lomba_penyelenggara');
            $table->string('lomba_kategori'); // Kategori lomba
            $table->string('lomba_deskripsi', 500); // Deskripsi lomba
            $table->date('lomba_tanggal'); // tanggal lomba
            $table->string('lomba_lokasi'); // Lokasi lomba
            $table->integer('lomba_kapasitas'); // Kapasitas peserta lomba
            $table->string('lomba_jenjang'); // jenjang Lomba
            $table->string('lomba_poster', 500)->nullable(); // Poster lomba (opsional)
            $table->string('lomba_form')->nullable(); // File terkait lomba (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_lomba');
    }
};
