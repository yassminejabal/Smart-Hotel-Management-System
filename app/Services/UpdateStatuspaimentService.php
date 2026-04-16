<?php

namespace App\Services;

use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class UpdateStatuspaimentService
{
    /**
     * Create a new class instance.
     */
    protected object $data;
    protected int $id;

    public function __construct($data, $id)
    {
        $this->data = $data;
        $this->id = $id;
    }
public function updateStatuspaimentservice()
{
    $reservation = Reservation::findOrFail($this->id);
    
    DB::transaction(function () use ($reservation) {
        $payment_status = $this->data->payment_status; 
        $reservation->payment_status = $payment_status;
        $reservation->save();
            $reservation->paiement->statut = $payment_status;
            $reservation->paiement->save();
            });
}
}