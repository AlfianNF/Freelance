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
        Schema::create('table_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('no_rm', 9);
            $table->text('riwayat_penyakit')->nullable();
            $table->text('alergi_obat')->nullable();
            $table->date('tgl_pemeriksaan');
            $table->string('status_pemeriksaan');
            $table->text('keluhan_pasien')->nullable();
            $table->text('pemeriksaan_fisik')->nullable();
            $table->text('catatan_dokter')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pemeriksaan');
    }
};
