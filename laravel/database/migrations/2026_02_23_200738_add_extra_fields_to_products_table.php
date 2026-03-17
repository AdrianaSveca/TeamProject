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
    Schema::table('products', function (Blueprint $table) {
        $table->text('information')->nullable();
        $table->text('directions')->nullable();
        $table->text('ingredients')->nullable();
        $table->text('nutrition')->nullable();
        $table->text('faqs')->nullable();
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn([
            'information',
            'directions',
            'ingredients',
            'nutrition',
            'faqs'
        ]);
    });
}
};