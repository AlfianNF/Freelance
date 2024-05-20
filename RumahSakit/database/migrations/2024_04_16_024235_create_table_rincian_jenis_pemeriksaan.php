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
        Schema::create('table_rincian_jenis_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jenis_pemeriksaan');
            $table->string('nama_jenis_pemeriksaan');
            $table->timestamps();

            $table->foreign('id_jenis_pemeriksaan')->references('id')->on('table_jenis_pemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_rincian_jenis_pemeriksaan');
    }
};
