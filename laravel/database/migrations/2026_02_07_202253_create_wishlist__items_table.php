<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * run the migrations
     */
    public function up(): void
    {
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products', 'product_id')
                ->cascadeOnDelete();

            $table->timestamps();

            // stops sme product being added twice by sme user
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * migrations reverse
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_items');
    }
};