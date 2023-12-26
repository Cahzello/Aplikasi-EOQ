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
        Schema::create('items_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('item_summaries_id')->constrained('items_summaries');
            $table->integer('eoq');
            $table->decimal('rop');
            $table->decimal('safety_stock');
            $table->integer('frekuensi');
            $table->integer('average_pembelian');
            $table->integer('frekuensi_konvensional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_results');
    }
};
