<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('chat_rooms', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->boolean('is_active')->default(true); // default value true
    });
}

public function down()
{
    Schema::table('chat_rooms', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->dropColumn('is_active');
    });
}
};
