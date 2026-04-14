<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('payment_status', 50)->change();
        });
        DB::table('reservations')
            ->whereNotIn('payment_status', ['En attente', 'Payé', 'Échoué'])
            ->update(['payment_status' => 'En attente']);
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('payment_status', ['En attente', 'Payé', 'Échoué'])
                  ->default('En attente')
                  ->change();
        });
    }
};