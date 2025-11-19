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
        Schema::create('Chatbot', function (Blueprint $table) {
            $table->id('chatbot_id');
            
            $table->foreignId('user_id')->nullable()->constrained('Users', 'user_id')->onDelete('cascade');

            $table->foreignId('admin_id')->nullable()->constrained('Admin', 'admin_id')->onDelete('cascade');

            $table->text('chatbot_user_message');
            $table->text('chatbot_ans');
            $table->dateTime('chatbot_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Chatbot');
    }
};
