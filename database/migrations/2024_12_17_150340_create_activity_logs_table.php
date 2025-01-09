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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // المستخدم المرتبط
            $table->string('name'); // وصف الإجراء
            $table->text('description')->nullable(); // تفاصيل الإجراء
            $table->unsignedBigInteger('service_id')->nullable(); // الخدمة المرتبطة
            $table->enum('status', ['pending', 'in_progress', 'cancelled'])->default('pending');
            $table->string('file_orginal_name')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
