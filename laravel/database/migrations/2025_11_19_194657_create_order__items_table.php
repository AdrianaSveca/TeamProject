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
        Schema::create('Order_Items', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained('Orders', 'order_id')->onDelete('cascade');

            $table->foreignId('product_id')->constrained('Products', 'product_id')->onDelete('cascade');
            
            $table->integer('order_item_quantity');
            $table->decimal('order_item_price', 10, 2);
            $table->enum('order_item_status', ['Purchased', 'Returned']);

            $table->primary(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Order_Items');
    }
};
