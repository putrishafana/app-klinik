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
        Schema::create('tb_pelayanan_obat', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('pemeriksaan_id')->nullable();
            $table->integer('obat_id')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('dosis', 45)->nullable();
            $table->string('catatan', 225)->nullable();
            $table->decimal('harga_satuan', 10, 0)->nullable();
            $table->decimal('total_harga', 10, 0)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pelayanan_obat');
    }
};
