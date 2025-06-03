<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stop_id')->constrained('bus_stops')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('message_type', ['text', 'image'])->default('text');
            $table->text('content');
            $table->string('image_url', 255)->nullable();
            $table->foreignId('reply_to_message_id')->nullable()->constrained('chat_messages')->onDelete('set null');
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();
            $table->index(['stop_id', 'created_at']);
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};