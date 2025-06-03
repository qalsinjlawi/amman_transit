<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->string('phone', 20)->unique()->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('preferred_area', 50)->nullable()->comment('المنطقة المفضلة في عمان');
            $table->enum('status', ['active', 'suspended'])->default('active');
            $table->timestamps();
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};