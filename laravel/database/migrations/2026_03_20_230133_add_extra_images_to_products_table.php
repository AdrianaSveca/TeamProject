<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->string('product_image_2')->nullable()->after('product_image');
            $table->string('product_image_3')->nullable()->after('product_image_2');
        });
    }

    public function down(): void
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->dropColumn(['product_image_2', 'product_image_3']);
        });
    }
};
