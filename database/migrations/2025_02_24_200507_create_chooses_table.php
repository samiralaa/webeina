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
        Schema::create('chooses', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->string('icon')->nullable();
            $table->json('description')->nullable();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->json('main_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chooses');
    }
};
