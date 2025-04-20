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
        Schema::create('tb_obat', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('obat')->nullable();
            $table->string('satuan', 45)->nullable();
            $table->integer('stok')->nullable();
            $table->decimal('harga', 10, 0)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_obat');
    }
};
