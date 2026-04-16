<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class UpdateReservationService
{
    protected array $data;
    protected int $id;

    public function __construct($data, $id)
    {
        $this->data = $data;
        $this->id = $id;
    }
    function updateReservationservicee()
    {
        return DB::transaction(function () {
            $reservation = Reservation::findOrFail($this->id);
            $reservation->update($this->data);
            Paiement::where('reservation_id', $reservation->id)->update([
                'montant'        => $this->data['total_price'] ?? $reservation->total_price,
                'statut' => $this->data['payment_status'] ?? $reservation->payment_status,
            ]);
            Facture::where('reservation_id', $reservation->id)->update([
                'total' => $this->data['total_price'] ?? $reservation->total_price,
            ]);
        });
    }
}
