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
        Schema::create('riwayat_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 9);
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->string('pemeriksaan');
            $table->string('status_pemeriksaan');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemeriksaan');
    }
};
