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
        Schema::create('Performance_Metrics', function (Blueprint $table) {
            $table->id('metric_id');
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');


            $table->decimal('fully_loaded_time_s')->nullable();
            $table->decimal('error_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Performance_Metrics');
    }
};
