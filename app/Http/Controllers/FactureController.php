<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{
   public function telechargerFacture($id)
    {
        $reservation = Reservation::findOrFail($id);
        $client_id = $reservation->client->id;
        $user = User::findOrFail($client_id);
           $donnees = [
    'client'         => $user->name, 
    'titre'          => 'Facture HOTELO',
    'date'           => now()->format('d/m/Y'),
    'price_totale'   => $reservation->total_price,
    'payment_status' => $reservation->payment_status,
    'check_in'       => $reservation->check_in,
    'check_out'      => $reservation->check_out,
];

$pdf = Pdf::loadView('Facture.pdf_facture', $donnees);
return $pdf->stream('facture_HOTELO_' . $reservation->id . '.pdf');
    }
}