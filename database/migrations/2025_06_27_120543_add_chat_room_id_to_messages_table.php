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
    Schema::table('messages', function (Blueprint $table) {
        $table->foreignId('chat_room_id')
              ->constrained()
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('messages', function (Blueprint $table) {
        $table->dropForeign(['chat_room_id']);
        $table->dropColumn('chat_room_id');
    });
}
};
