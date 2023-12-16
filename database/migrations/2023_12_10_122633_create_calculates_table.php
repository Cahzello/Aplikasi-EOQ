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
        Schema::create('calculates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('bahan_baku');
            $table->integer('eoq');
            $table->decimal('rop', 10, 1);
            $table->decimal('safety_stock', 10, 1);
            $table->integer('frekuensi');
            $table->integer('frekuensi_konvensional');
            $table->integer('average_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculates');
    }
};
