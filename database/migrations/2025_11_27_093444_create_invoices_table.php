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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('InvoiceDate');
            $table->string('CustomerName');
            $table->foreignId('OrderID')->constrained(table: 'detail_orders')->onDelete('cascade');
            $table->foreignId('CreatedBy')->constrained(table: 'users')->onDelete('cascade');
            $table->foreignId('PaymentID')->constrained(table: 'payments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
