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
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('points')->default(0); // total progress points
            $table->unsignedTinyInteger('level')->default(1); // 1 to 7
            $table->unsignedTinyInteger('rank')->default(1); // Optional gamified rank (1 to 7)
            $table->unsignedTinyInteger('streak_days')->default(0); // consecutive victories
            $table->unsignedTinyInteger('missed_checkins')->default(0); // consecutive days missed
            $table->boolean('panic_action')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};
