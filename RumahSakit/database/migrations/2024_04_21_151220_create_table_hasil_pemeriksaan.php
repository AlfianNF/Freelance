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
        Schema::create('table_hasil_pemeriksaan', function (Blueprint $table) {
             // Menambah kolom baru untuk foreign key
             $table->id();
             $table->unsignedBigInteger('id_user');
             $table->unsignedBigInteger('id_pemeriksaan');
             $table->unsignedBigInteger('id_rincian_jenis_pemeriksaan');
             $table->text('hasil_pemeriksaan')->nullable();
             $table->text('satuan_pemeriksaan')->nullable();
             $table->text('nilai_rujukan')->nullable();
             $table->timestamps();
 
             // Menambah foreign key
             $table->foreign('id_user')->references('id')->on('users');
             $table->foreign('id_pemeriksaan')->references('id')->on('table_pemeriksaan');
             $table->foreign('id_rincian_jenis_pemeriksaan')->references('id')->on('table_rincian_jenis_pemeriksaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_hasil_pemeriksaan');
    }
};
