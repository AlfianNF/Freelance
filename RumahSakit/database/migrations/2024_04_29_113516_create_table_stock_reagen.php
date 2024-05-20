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
        Schema::create('table_stock_reagen', function (Blueprint $table) {
            $table->id();
            $table->string('penanggung_jawab');
            $table->date('tgl');
            $table->string('pemeriksaan');
            $table->string('satuan');
            $table->integer('masuk')->unsigned();
            $table->integer('keluar')->unsigned();
            $table->integer('stock')->unsigned();
            $table->integer('sisa_kit')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_stock_reagen');
    }
};
