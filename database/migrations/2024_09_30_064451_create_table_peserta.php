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
        Schema::create('tb_peserta', function (Blueprint $table) {
            $table->id('peserta_id');
            $table->string('peserta_nama');
            $table->enum('peserta_gender', ['Laki-laki', 'Perempuan']);
            $table->date('peserta_tanggallahir');
            $table->string('peserta_pendidikan');
            $table->string('peserta_email')->unique();
            $table->string('peserta_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peserta');
    }
};
