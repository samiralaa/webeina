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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable(); // Localized titles
            $table->json('description')->nullable(); // Localized descriptions
            $table->string('link')->nullable();
            $table->boolean('status')->default(true);
            $table->string('type'); // Type of section (e.g. 'text', 'image', 'video')
            $table->json('link_text')->nullable(); // Localized link text
            $table->json('bottom_text')->nullable(); // Localized bottom text
            $table->json('subtitle')->nullable(); // Localized subtitles
            $table->json('slider_name')->nullable();
            $table->string('order')->nullable();
            $table->enum('page_type', ['home', 'about', 'services', 'portfolio', 'blog', 'contact'])->default('home');
            $table->json('slider_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
