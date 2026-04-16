<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationService
{
    /**
     * Create a new class instance.
     */
    public function createReservation(array $data)
    {
        return DB::transaction(function () use ($data) {
            $reservation = Reservation::create([
                'client_id'      => $data['client_id'],
                'chambre_id'     => $data['chambre_id'],
                'check_in'       => $data['check_in'],
                'check_out'      => $data['check_out'],
                'invitees'       => $data['invitees'],
                'total_price'    => $data['total_price'],
                'payment_status' => 'En attente',
            ]);
            Paiement::create([
                'reservation_id' => $reservation->id,
                'montant'        => $data['total_price'],
                'date_paiement'  => now(),
                'payment_status' => $data['payment_status'],
            ]);
            Facture::create([
                'reservation_id' => $reservation->id,
                'date_facture'   => now(),
                'total'          => $data['total_price'],
            ]);
        });
    }
}
