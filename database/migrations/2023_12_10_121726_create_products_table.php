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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('bahan_baku');
            $table->string('total_penggunaan_tahunan');
            $table->string('max_penggunaan_tahunan');
            $table->string('average_penggunaan_tahunan');
            $table->string('biaya_pemesanan');
            $table->string('biaya_penyimpanan');
            $table->string('average_pembelian');
            $table->string('leadtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
