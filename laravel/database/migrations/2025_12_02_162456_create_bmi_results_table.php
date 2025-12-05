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
        Schema::create('BMI_Results', function (Blueprint $table) {
            $table->id('bmi_result_id');
            $table->string('name');
            $table->float('min_score');
            $table->float('max_score');
            $table->text('advice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BMI_Results');
    }
};
