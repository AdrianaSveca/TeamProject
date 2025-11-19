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
        Schema::create('Basket_Items', function (Blueprint $table) {
            $table->foreignId('basket_id')->constrained('Basket', 'basket_id')->onDelete('cascade');

            $table->foreignId('product_id')->constrained('Products', 'product_id')->onDelete('cascade');
            
            $table->integer('basket_item_quantity');
            $table->decimal('basket_item_price', 10, 2);

            $table->primary(['basket_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Basket_Items');
    }
};
