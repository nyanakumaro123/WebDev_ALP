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
        Schema::create('stock_historys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ProductID')->constrained(
                table: 'products'
            )->onDelete('cascade');
            $table->date('StockDate');
            $table->foreignId('UserID')->constrained(
                table: 'users'
            )->onDelete('cascade');
            $table->foreignId('SupplierID')->constrained(
                table: 'suppliers'
            )->onDelete('cascade');
            $table->integer('StockQuantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_historys');
    }
};
