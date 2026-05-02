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
    public function updateStatuspaimentservice($data, $id)
    {
        $reservation = Reservation::findOrFail($id);

        DB::transaction(function () use ($reservation, $data) {
            $payment_status = $data->payment_status;
            $reservation->payment_status = $payment_status;
            $reservation->save();
            $reservation->paiement->statut = $payment_status;
            $reservation->paiement->save();
        });
    }
}
