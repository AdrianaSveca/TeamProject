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
        Schema::create('Ratings', function (Blueprint $table) {
            $table->id('rating_id');

            $table->foreignId('user_id')->nullable()->constrained('Users', 'user_id')->onDelete('cascade');

            $table->foreignId('admin_id')->nullable()->constrained('Admin', 'admin_id')->onDelete('no action');

            $table->foreignId('product_id')->constrained('Products', 'product_id')->onDelete('cascade');

            $table->decimal('rating', 4, 2);  
            $table->text('rating_comment')->nullable();
            $table->dateTime('rating_date');
            $table->boolean('approved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ratings');
    }
};
