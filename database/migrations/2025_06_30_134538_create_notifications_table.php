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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // User who is receiving the notification (the target user)
            $table->string('type');  // The type of the notification (like 'post_like', 'comment', 'follow', etc.)
            $table->string('title');  // Title and message for the notification
            $table->string('message');
            $table->enum('status', ['unread', 'read'])->default('unread');  // Status of the notification (unread or read)
            $table->foreignId('related_id')->nullable()->constrained(); // Post, Comment, etc.
            $table->string('related_type')->nullable(); // To store related model type (like 'Post', 'Comment')
            $table->json('data')->nullable(); // Optional field for storing dynamic data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
