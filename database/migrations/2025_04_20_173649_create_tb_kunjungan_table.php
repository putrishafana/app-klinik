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
        Schema::create('tb_kunjungan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('pasien_id')->nullable();
            $table->date('tanggal_kunjungan')->nullable();
            $table->string('keluhan', 255)->nullable();
            $table->integer('pegawai_id')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_kunjungan');
    }
};