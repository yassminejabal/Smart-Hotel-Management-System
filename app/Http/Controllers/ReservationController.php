<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Mail\ReceptionnesteMail;
use App\Models\Chambre;
use App\Models\Reservation;
use App\Models\User;
use App\Services\ReservationService;
use App\Services\updatePaymentStatusReservationConfirmationSERVICE;
use App\Services\UpdateReservationService;
use App\Services\UpdateStatuspaimentService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'chambre'])->paginate(10);

        return view('reservation.index', compact('reservations'));
    }

    public function create()
    {
        $users = User::where('role', 'Client')->where('is_banne', false)->get();
        $Chambres = Chambre::where('statut', 'Disponible')->get();
        return view('reservation.create', compact('users', 'Chambres'));
    }

    public function store(ReservationRequest $request)
    {
        try {
            $ReservationService = new ReservationService();
            $ReservationService->createReservation($request->validated());
            return redirect()->route('reservations.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $users = User::where('role', 'Client')
            ->where('is_banne', false)->orWhere('id', $reservation->client_id)->get();
        $Chambres = Chambre::where('statut', 'Disponible')->orWhere('id', $reservation->chambre_id)->get();
        return view('reservation.edit', compact('reservation', 'users', 'Chambres'));
    }


    public function update(ReservationUpdateRequest $request, $id)
    {
        try {
            $UpdateReservationService = new UpdateReservationService($request->validated(), $id);
            $UpdateReservationService->updateReservationservicee();
            return redirect()->route("reservations.index");
        } catch (Exception $th) {
            return back()->with('error update', $th->getMessage());
        }
    }


    public function updatePaymentStatusReservationConfirmation(Request $request, $id)
    {

        // dd($request,$id);
        $updatepayementconfirmeeservice = new updatePaymentStatusReservationConfirmationSERVICE();
        $updatepayementconfirmeeservice->PayementAndcofirmereservationService($request, $id);
        return back();
    }

    public function updateStatuspaiment(Request $request, $id)
    {


        try {
            $UpdateStatuspaimentService = new UpdateStatuspaimentService($request, $id);
            $UpdateStatuspaimentService->updateStatuspaimentservice();
            return back();
        } catch (Exception $th) {
            return back('eroor Status paiment', $th->getMessage());
        }
    }
    public function showPaiement($id)
    {
        $reservation = Reservation::with(['client', 'chambre'])->findOrFail($id);
        return view('reservation.paiement', compact('reservation'));
    }
    public function contactReseptioneste()
    {
        return view('clients.contactReseptioneste');
    }
    public function contactsendReseptioneste(Request $request)
    {
        $client = auth()->user();
        $emailReseptioneste = 'fycozutaxu@mailinator.com';
        $data = $request->validate([
            'check_in'  => 'required',
            'check_out' => 'required',
            ]);
            try {
                Mail::to($emailReseptioneste)->send(new ReceptionnesteMail($data,$client));
                // dd($client);
            return redirect()->route('client.dashboard')->with('message_envoi_a_reseptioneste','Email envoyer au receptionniste');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}