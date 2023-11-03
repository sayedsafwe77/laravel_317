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
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->float('discount')->nullable();
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->float('discount')->default(0);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->float('discount')->default(0);
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
