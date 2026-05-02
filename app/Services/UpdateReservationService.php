<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class UpdateReservationService
{
    function updateReservationservicee($data, $id)
    {
        return DB::transaction(function () use ($data,$id) {
            $reservation = Reservation::findOrFail($id);
            $reservation->update($data);
            Paiement::where('reservation_id', $reservation->id)->update([
                'montant'        => $data['total_price'] ?? $reservation->total_price,
                'statut' => $data['payment_status'] ?? $reservation->payment_status,
            ]);
            Facture::where('reservation_id', $reservation->id)->update([
                'total' => $data['total_price'] ?? $reservation->total_price,
            ]);
        });
    }
}
