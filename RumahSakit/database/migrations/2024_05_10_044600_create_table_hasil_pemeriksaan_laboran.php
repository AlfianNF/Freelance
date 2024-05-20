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
        Schema::create('table_hasil_pemeriksaan_laboran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pemeriksaan');
            $table->unsignedBigInteger('id_rincian_pemeriksaan');
            $table->string('no_rm', 9);
            $table->string('nik', 16);
            $table->string('name');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('pemeriksaan');
            $table->string('hasil_pemeriksaan');
            $table->string('satuan_pemeriksaan');
            $table->string('nilai_rujukan');
            $table->text('catatan_dokter');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_pemeriksaan')->references('id')->on('table_jenis_pemeriksaan');
            $table->foreign('id_rincian_pemeriksaan')->references('id')->on('table_rincian_jenis_pemeriksaan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_hasil_pemeriksaan_laboran');
    }
};