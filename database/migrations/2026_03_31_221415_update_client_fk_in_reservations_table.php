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
    Schema::table('reservations', function (Blueprint $table) {
        // نحيد foreign key القديمة (ديال users)
        $table->dropForeign(['client_id']);

        // نربطها بـ clients
        $table->foreign('client_id')
              ->references('id')
              ->on('clients')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('reservations', function (Blueprint $table) {
        $table->dropForeign(['client_id']);

        $table->foreign('client_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade');
    });
}
};
