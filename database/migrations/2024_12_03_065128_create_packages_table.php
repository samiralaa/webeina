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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // Stores the title as a JSON object
            $table->json('sun_title')->nullable(); // Stores the subtitle as a JSON object
            $table->json('description')->nullable(); // Stores the description as a JSON object
            $table->decimal('price', 10, 2); // Price with 2 decimal precision
            $table->json('features')->nullable(); // Features as a JSON array
            $table->string('image')->nullable(); // Image path
            $table->integer('subscription_time'); // Subscription time in days
            
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Foreign key for quiz_answers

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
