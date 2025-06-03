<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_id')->constrained('bus_lines')->onDelete('cascade');
            $table->time('departure_time');
            $table->enum('day_type', ['weekday', 'friday', 'saturday'])->default('weekday');
            $table->enum('direction', ['forward', 'backward']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['line_id', 'day_type', 'direction']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bus_schedules');
    }
};