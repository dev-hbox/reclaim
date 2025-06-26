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
        Schema::create('daily_reflections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->boolean('is_victory'); // true = victory, false = setback
            $table->unsignedTinyInteger('temptation_level')->nullable(); // scale 0–10
            $table->enum('temptation_label', ['low', 'medium', 'high'])->nullable(); // optional alt label
            $table->enum('time_of_day', ['morning', 'afternoon', 'evening', 'night'])->nullable();
            $table->string('triggers')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->unique(['user_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_reflections');
    }
};
