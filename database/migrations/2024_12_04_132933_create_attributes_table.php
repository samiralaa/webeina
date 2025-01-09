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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attributable_type'); // The type of entity the attribute belongs to (e.g., Book, Product)
            $table->string('field_type'); // The type of field (text, number, textarea, select)
            $table->boolean('is_required'); // Whether the field is required or not
            $table->boolean('show_in_table'); // Whether to display this attribute in a table
            $table->json('key'); // Store the keys (in multiple languages)
            $table->json('options')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
