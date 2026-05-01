<?php

namespace App\Services;

use App\Models\Paiement;
use App\Models\Reservation;

class updatePaymentStatusReservationConfirmationSERVICE
{
    /**
     * Create a new class instance.
     */
    function PayementAndcofirmereservationService($request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = $request->status;
        $reservation->save();
    }
}