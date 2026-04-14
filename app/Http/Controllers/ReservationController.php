<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ReservationRequest;
use App\Models\Chambre;
use App\Models\Facture;
use App\Models\Paiement;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'chambre'])->get();
        return view('reservation.index', compact('reservations'));
    }

    

    public function create()
    {
        $clients = Client::all();
        $Chambres = Chambre::where('statut', 'Disponible')->get();
        return view('reservation.create', compact('clients', 'Chambres'));
    }



    public function store(ReservationRequest $request)
    {
        $validated = $request->validated();
        $reservation = Reservation::create([
            'client_id'      => $validated['client_id'],
            'chambre_id'     => $validated['chambre_id'],
            'check_in'       => $validated['check_in'],
            'check_out'      => $validated['check_out'],
            'invitees'       => $validated['invitees'],
            'total_price'    => $validated['total_price'],
            'payment_status' => 'En attente',
        ]);
        Paiement::create([
            'reservation_id' => $reservation->id,
            'montant'        => $validated['total_price'],
            'date_paiement'  => now(),
            'payment_status' => $validated['payment_status'],
        ]);
        Facture::create([
            'reservation_id' => $reservation->id,
            'date_facture'   => now(),
            'total'          => $validated['total_price'],
        ]);

        return redirect()->route('reservations.index');
    }



    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $clients = Client::all();

        $Chambres = Chambre::where('statut', 'Disponible')
            ->orWhere('id', $reservation->chambre_id)
            ->get();

        return view('reservation.edit', compact('reservation', 'clients', 'Chambres'));
    }


    public function update(Request $request, $id)
    {
    $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'client_id'      => $request['client_id'],
            'chambre_id'     => $request['chambre_id'],
            'check_in'       => $request['check_in'],
            'check_out'      => $request['check_out'],
            'invitees'       => $request['invitees'],
            'total_price'    => $request['total_price'],
            'payment_status' => $request['payment_status'],
            'status'         => $request['status'],
        ]);

        return redirect()->route("reservations.index");
    }


    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index');
    }


    public function updatePaymentStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        // dd($request);
        $reservation->status = $request->status;
        $reservation->save();
        $paiment = Paiement::findOrFail($reservation->id, "reservation_id");
        $paiment->statut = $reservation->statut;
        return back();
    }

    // #parameters: array:3 [▼
    //   "_token" => "SmNcenUcCm5EzSTOdNSoUnKH42BvuHVLpanvuYH6"
    //   "_method" => "PATCH"
    //   "statut" => "Payé"
    // ]
    public function updateStatus(Request $request, $id)
    {
        $paiment = Paiement::findOrFail($id);
        $paiment->statut = $request->statut;
        $paiment->save();
        $reservation = $paiment->reservation;
        $check = $reservation->payment_status = $request->statut;
        $reservation->save();
        return back();
    }
    public function showPaiement($id)
    {
        $reservation = Reservation::with(['client', 'chambre'])->findOrFail($id);

        return view('reservation.paiement', compact('reservation'));
    }
}
