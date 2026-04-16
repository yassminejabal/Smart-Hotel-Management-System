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
        $paiment = Paiement::findOrFail($this->id);
        DB::transaction(function () use ($paiment) {
            $reservation = $paiment->reservation;
            $reservation->payment_status = $this->data->statut;
            $reservation->save();
            $paiment->statut = $this->data->statut;
            $paiment->save();
        });
    }
}
