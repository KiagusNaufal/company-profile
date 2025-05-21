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
        Schema::table('produk', function (Blueprint $table) {
            $table->text('pain_description')->nullable()->after('description');
            $table->text('gain_description')->nullable()->after('pain_description');
            $table->text('solution_description')->nullable()->after('gain_description');
            $table->json('pain_points')->nullable()->after('solution_description');
            $table->json('gain_points')->nullable()->after('pain_points');
            $table->json('solution_points')->nullable()->after('gain_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
