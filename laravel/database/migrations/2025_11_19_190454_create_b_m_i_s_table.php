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
        Schema::create('BMI', function (Blueprint $table) {
            $table->id('bmi_id');

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');


            $table->decimal('bmi_height');
            $table->decimal('bmi_weight');
            $table->decimal('bmi_result');
            $table->text('bmi_feedback')->nullable();
            $table->dateTime('bmi_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BMI');
    }
};
