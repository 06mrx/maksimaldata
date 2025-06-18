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
        Schema::create('participants', function (Blueprint $table) {
            // UUID sebagai id utama
            $table->uuid('id')->primary();

            // Informasi peserta
            $table->string('training_schedule_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->string('tshirt_size');

            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // Tambahkan soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
