<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (Schema::hasColumn('reservations', 'user_id')) {
                try {
                    DB::statement('ALTER TABLE reservations DROP FOREIGN KEY reservations_user_id_foreign');
                } catch (\Exception $e) {
                    // ignore when FK does not exist
                }

                $table->renameColumn('user_id', 'client_id');
            }

            if (!Schema::hasColumn('reservations', 'client_id')) {
                $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            } else {
                try {
                    DB::statement('ALTER TABLE reservations DROP FOREIGN KEY reservations_client_id_foreign');
                } catch (\Exception $e) {
                    // ignore when FK does not exist
                }
                $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (Schema::hasColumn('reservations', 'client_id')) {
                $table->dropForeign(['client_id']);
                $table->renameColumn('client_id', 'user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }
};
