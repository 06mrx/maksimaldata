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
        Schema::create('training_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');          // singkatan, misal: MTRE
            $table->string('full_name');    // kepanjangan, misal: MikroTik Routing Expert
            // $table->integer('duration_hours'); // waktu pelatihan dalam jam
            $table->string('location');      // lokasi pelatihan
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_types');
    }
};
