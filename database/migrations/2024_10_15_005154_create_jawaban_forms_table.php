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
        Schema::create('tb_jawaban', function (Blueprint $table) {
            $table->id('jawaban_id');
            $table->string('jawaban_penyelenggara');
            $table->string('jawaban_peserta');
            $table->string('jawaban_lomba');
            $table->json('jawaban_content');
            $table->json('jawaban_label');
            $table->json('jawaban_input');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jawaban');
    }
};
