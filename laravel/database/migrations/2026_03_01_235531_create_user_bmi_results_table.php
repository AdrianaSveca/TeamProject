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
    Schema::create('user_bmi_results', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->float('bmi');
        $table->string('bmi_category');

        $table->integer('maintenance_calories');
        $table->integer('goal_calories');

        $table->integer('protein');
        $table->integer('fat');
        $table->integer('carbs');

        $table->text('training_plan')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bmi_results');
    }
};
