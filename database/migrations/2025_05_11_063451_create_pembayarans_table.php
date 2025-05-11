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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade');
            $table->string('merchant_order_id')->nullable();
            $table->foreign('merchant_order_id')->references('merchant_order_id')->on('pembayaran_duitku')->onDelete('cascade');
            $table->double('nominal')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = unpaid, 1 = paid, 2 = expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
