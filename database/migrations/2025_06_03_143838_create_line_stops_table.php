<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('line_stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')->constrained('bus_lines')->onDelete('cascade');
            $table->foreignId('stop_id')->constrained('bus_stops')->onDelete('cascade');
            $table->integer('stop_order');
            $table->enum('direction', ['forward', 'backward']);
            $table->integer('arrival_time_offset')->nullable();
            $table->timestamps();
            $table->index(['line_id', 'direction', 'stop_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('line_stops');
    }
};