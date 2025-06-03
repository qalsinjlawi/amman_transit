<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bus_lines', function (Blueprint $table) {
            $table->id();
            $table->string('line_number', 10)->unique();
            $table->string('line_name', 100);
            $table->string('start_station', 100);
            $table->string('end_station', 100);
            $table->decimal('ticket_price', 4, 2)->default(0.50);
            $table->integer('frequency_minutes')->default(15);
            $table->time('start_time')->default('06:00:00');
            $table->time('end_time')->default('22:00:00');
            $table->enum('status', ['active', 'maintenance', 'suspended'])->default('active');
            $table->timestamps();
            $table->index('line_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bus_lines');
    }
};