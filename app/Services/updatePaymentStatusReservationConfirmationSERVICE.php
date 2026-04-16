<?php

namespace App\Services;

use App\Models\Paiement;
use App\Models\Reservation;

class updatePaymentStatusReservationConfirmationSERVICE
{
    /**
     * Create a new class instance.
     */
    protected object $request;
    protected int $id;
    public function __construct($request, $id)
    {
        $this->request = $request;
        $this->id = $id;
    }
    function PayementAndcofirmereservationService()
    {
        $reservation = Reservation::findOrFail($this->id);
        $reservation->status = $this->request->status;
        $reservation->save();
        $paiment = $reservation->paiement;
        $paiment->statut = $this->request->statut;
    }
}
