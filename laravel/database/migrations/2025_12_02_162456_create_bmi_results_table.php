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
        Schema::create('bmi_results', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->float('min_score');
        $table->float('max_score');
        
        // Which category of products to recommend?
        $table->foreignId('recommended_category_id')->constrained('categories')->onDelete('cascade');
        
        $table->text('advice'); // e.g., "You need to eat more calories..."
        $table->timestamps();
    });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bmi_results');
    }
};
