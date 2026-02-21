<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. Adds the order_discount column to the Orders table to record how much was discounted when a discount code was used.
     */
    public function up(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->decimal('order_discount', 10, 2)->default(0)->after('order_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Orders', function (Blueprint $table) {
            $table->dropColumn('order_discount');
        });
    }
};
