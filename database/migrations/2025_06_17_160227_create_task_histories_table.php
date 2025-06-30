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
        Schema::create('task_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('task_type'); // mental, physical, breathing, etc.
            $table->text('task_description'); // Detailed description of the task
            $table->timestamp('completed_at'); // Time when the task was completed
            $table->text('notes')->nullable(); // Any notes from the user (feedback)
            $table->boolean('is_correct')->nullable(); // If the task was completed correctly (for mental tasks)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_histories');
    }
};
