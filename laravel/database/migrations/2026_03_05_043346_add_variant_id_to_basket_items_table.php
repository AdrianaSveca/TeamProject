<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Basket_Items', function (Blueprint $table) {
            $table->foreignId('variant_id')->nullable()->after('product_id');
        });
    }

    public function down(): void
    {
        Schema::table('Basket_Items', function (Blueprint $table) {
            $table->dropColumn('variant_id');
        });
    }
};