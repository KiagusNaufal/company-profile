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
        Schema::create('pembayaran_duitku', function (Blueprint $table) {
            $table->string('merchant_order_id')->primary();
            $table->string('reference')->nullable();
            $table->string('payment_method')->nullable();
            $table->text('transaction_response')->nullable();
            $table->text('callback_response')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_duitku');
    }
};
