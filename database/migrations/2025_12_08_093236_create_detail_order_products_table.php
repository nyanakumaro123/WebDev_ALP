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
        Schema::create('detail_order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('DetailOrderId')->constrained(table: 'detail_orders')->onDelete('cascade');
            $table->foreignId('ProductId')->constrained(table: 'products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_order_products');
    }
};
