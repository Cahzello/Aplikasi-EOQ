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
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->string('bulan');
            $table->decimal('jumlah_pembelian')->nullable();
            $table->decimal('jumlah_penggunaan')->nullable();
            $table->decimal('biaya_pemesanan')->nullable();
            $table->decimal('biaya_penyimpanan')->nullable();
            $table->integer('leadtime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_details');
    }
};
