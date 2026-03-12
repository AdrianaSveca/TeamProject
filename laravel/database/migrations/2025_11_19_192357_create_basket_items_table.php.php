<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('basket_items', function (Blueprint $table) {

            $table->id('basket_item_id');

            $table->foreignId('basket_id')
                  ->constrained('basket', 'basket_id')
                  ->onDelete('cascade');

            $table->foreignId('product_id')
                  ->constrained('products', 'product_id')
                  ->onDelete('cascade');

            $table->integer('basket_item_quantity');
            $table->decimal('basket_item_price', 10, 2);

            $table->string('flavour')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('basket_items');
    }
};