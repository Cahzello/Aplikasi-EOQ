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
        Schema::create('items_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->integer('total_penggunaan_tahunan');
            $table->integer('max_penggunaan_tahunan');
            $table->integer('average_penggunaan_tahunan');
            $table->integer('biaya_pemesanan');
            $table->integer('biaya_penyimpanan');
            $table->integer('leadtime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_summary');
    }
};
