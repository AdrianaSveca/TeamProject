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
        Schema::create('Orders', function (Blueprint $table) {
            $table->id('order_id');

            $table->foreignId('user_id')->nullable()->constrained('Users', 'user_id')->onDelete('cascade');

            $table->foreignId('admin_id')->nullable()->constrained('Admin', 'admin_id')->onDelete('cascade');

            $table->decimal('order_total', 10, 2);
            $table->enum('order_status', ['Pending', 'Shipped', 'Delivered']);
            $table->text('order_address');
            $table->integer('days_until_delivery')->nullable();
            $table->dateTime('order_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Orders');
    }
};
