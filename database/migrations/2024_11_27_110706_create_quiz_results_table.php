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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade'); // Foreign key for customers
            $table->foreignId('question_id')->constrained('quiz_questions')->onDelete('cascade'); // Foreign key for quiz_questions
            $table->foreignId('answer_id')->constrained('quiz_answers')->onDelete('cascade'); // Foreign key for quiz_answers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
