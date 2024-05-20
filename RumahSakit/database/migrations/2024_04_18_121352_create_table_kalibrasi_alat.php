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
        Schema::create('table_kalibrasi_alat', function (Blueprint $table) {
            $table->id();
            $table->string('penanggung_jawab');
            $table->string('nama_alat');
            $table->string('nomor_alat');
            $table->date('kalibrasi_sebelumnya')->nullable();
            $table->date('kalibrasi_selanjutnya')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_kalibrasi_alat');
    }
};
