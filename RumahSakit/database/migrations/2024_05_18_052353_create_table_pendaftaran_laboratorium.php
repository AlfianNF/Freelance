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
        Schema::create('table_pendaftaran_laboratorium', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_pemeriksaan')->nullable();
            $table->unsignedBigInteger('id_rincian_pemeriksaan')->nullable();
            $table->unsignedBigInteger('id_dokter')->nullable();
            $table->string('no_rm', 9)->nullable();
            $table->string('name');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->boolean('jenis_kelamin');
            $table->string('umur');
            $table->string('nama_pemeriksaan')->nullable();
            $table->string('jenis_pemeriksaan')->nullable();
            $table->string('dokter_pengirim')->nullable();
            $table->string('jaminan')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_dokter')->references('id')->on('users');
            $table->foreign('id_pemeriksaan')->references('id')->on('table_jenis_pemeriksaan');
            $table->foreign('id_rincian_pemeriksaan')->references('id')->on('table_rincian_jenis_pemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pendaftaran_laboratorium');
    }
};
