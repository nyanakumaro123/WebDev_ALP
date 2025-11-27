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
            $table->timestamps();
            $table->string('ProductName');
            $table->foreignId('BrandID')->constrained()->onDelete('cascade');
            $table->int('Price');
            $table->int('ProductQuantity');
            $table->string('Image');
            $table->foreignId('ProductTypeID')->constrained()->onDelete('cascade');
            $table->foreignId('ProductCategioryID')->constrained()->onDelete('cascade');
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
