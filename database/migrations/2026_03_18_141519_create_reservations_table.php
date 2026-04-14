<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('chambre_id')->constrained('chambres')->onDelete('cascade');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('invitees');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['en_attente', 'confirmee', 'annulee'])->default('en_attente');
            $table->integer('paiement'); 
            $table->enum('payment_status', ['non_paye', 'paye'])->default('non_paye');
            $table->unique(['chambre_id', 'check_in', 'check_out']);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};