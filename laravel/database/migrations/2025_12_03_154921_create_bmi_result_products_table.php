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
        Schema::create('BMI_Result_Products', function (Blueprint $table) {
            $table->id('bmi_result_product_id');

            $table->foreignId('bmi_result_id')->constrained('bmi_results', 'bmi_result_id')->onDelete('cascade');

            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BMI_Result_Products');
    }
};
