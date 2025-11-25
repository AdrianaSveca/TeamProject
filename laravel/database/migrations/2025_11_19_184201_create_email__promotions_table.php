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
        Schema::create('Email_Promotions', function (Blueprint $table) {
            $table->id('email_id');

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('email_subject');
            $table->text('email_body');
            $table->dateTime('email_sent_time')->nullable();
            $table->enum('email_status', ['Sent', 'Failed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Email_Promotions');
    }
};
