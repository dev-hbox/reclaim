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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('age');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone')->default('0');
            $table->enum('task_category', ['mental', 'physical', 'breathing', 'habit', 'random'])->nullable()->default('random');
            $table->enum('task_intensity', ['light', 'moderate', 'deep'])->nullable()->default('light');
            $table->string('avatar')->default('/uploads/profile/user-default.png');
            $table->unsignedTinyInteger('risk_score')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
