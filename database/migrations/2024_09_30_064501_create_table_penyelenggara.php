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
        Schema::create('tb_penyelenggara', function (Blueprint $table) {
            $table->id('penyelenggara_id');
            $table->string('penyelenggara_nama');
            $table->string('penyelenggara_alamat');
            $table->date('penyelenggara_tahunberdiri');
            $table->string('penyelenggara_bidang');
            $table->string('penyelenggara_email')->unique();
            $table->string('penyelenggara_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penyelenggara');
    }
};
