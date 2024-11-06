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
        Schema::create('tb_sertifikat', function (Blueprint $table) {
            $table->id('sertifikat_id');
            $table->string('sertifikat_peserta');
            $table->string('sertifikat_peringkat');
            $table->string('sertifikat_lomba');
            $table->string('sertifikat_file')->nullable();
            $table->string('sertifikat_pesan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sertifikat');
    }
};
