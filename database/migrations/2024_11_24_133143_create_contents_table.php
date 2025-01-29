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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->json('title')->nullable(); // For multilingual titles
            $table->json('description')->nullable(); // For multilingual descriptions
            $table->string('image', 255)->nullable();
          
            $table->json('status')->nullable(); // For storing status as an array
            $table->string('type')->nullable(); // For storing content type (e.g. text, image, video, etc.)
            $table->json('sub_title')->nullable(); // For storing video paths
            $table->string('link')->nullable();
            $table->json('questions')->nullable();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
