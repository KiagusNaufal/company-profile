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
       Schema::table('serial_number', function (Blueprint $table) {
          $table->unsignedBigInteger('pembayaran_id')->nullable()->after('id');
          $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('set null');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('serial_number', function (Blueprint $table) {
            $table->dropForeign(['pembayaran_id']);
            $table->dropColumn('pembayaran_id');
        });
    }

};
