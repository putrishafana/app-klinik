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
        Schema::create('tb_pemeriksaan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('kunjungan_id')->nullable();
            $table->integer('pegawai_id')->nullable();
            $table->text('diagnosa')->nullable();
            $table->text('catatan')->nullable();
            $table->dateTime('waktu_periksa')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemeriksaan');
    }
};
