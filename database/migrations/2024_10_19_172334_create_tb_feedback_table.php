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
        Schema::create('tb_feedback', function (Blueprint $table) {
            $table->bigIncrements('feedback_id');
            $table->string('feedback_rating', 255);
            $table->string('feedback_isi', 500);
            $table->string('feedback_peserta', 255);
            $table->string('feedback_lomba', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_feedback');
    }
};
