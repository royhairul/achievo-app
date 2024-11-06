<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_prestasi', function (Blueprint $table) {
            $table->bigIncrements('prestasi_id');
            $table->string('prestasi_nama', 255);
            $table->string('prestasi_judul', 255);
            $table->string('prestasi_nomor', 255);
            $table->string('prestasi_nominasi', 255);
            $table->string('prestasi_kategori', 255);
            $table->date('prestasi_tanggal');
            $table->string('prestasi_peserta', 255);
            $table->string('prestasi_lomba', 255)->nullable();
            $table->string('prestasi_penyelenggara', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_prestasi');
    }
};
