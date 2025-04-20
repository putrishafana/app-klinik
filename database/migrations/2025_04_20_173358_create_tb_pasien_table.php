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
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama', 225)->nullable();
            $table->string('nik', 45)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->integer('jenis_kelamin')->nullable();
            $table->longText('alamat')->nullable();
            $table->integer('wilayah_id')->nullable();
            $table->string('no_telp', 45)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pasien');
    }
};
