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

    public function store(ReservationRequest $request, ReservationService $ReservationService)
    {
        try {
            $ReservationService->createReservation($request->validated());
            return redirect()->route('reservations.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $users = User::where('id', $reservation->client_id)->get();
        $Chambres = Chambre::where('id', $reservation->chambre_id)->get();
        return view('reservation.edit', compact('reservation', 'users', 'Chambres'));
    }


    public function update(ReservationUpdateRequest $request, $id, UpdateReservationService $UpdateReservationService)
    {
        try {
            $UpdateReservationService->updateReservationservicee($request->validated(), $id);
            return redirect()->route("reservations.index");
        } catch (Exception $th) {
            return back()->with('error update', $th->getMessage());
        }
    }


    public function updatePaymentStatusReservationConfirmation(Request $request, $id, updatePaymentStatusReservationConfirmationSERVICE $updatepayementconfirmeeservice)
    {
        $updatepayementconfirmeeservice->PayementAndcofirmereservationService($request, $id);
        return back();
    }

    public function updateStatuspaiment(Request $request, $id, UpdateStatuspaimentService $UpdateStatuspaimentService)
    {


        try {
            $UpdateStatuspaimentService->updateStatuspaimentservice($request, $id);
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
            Mail::to($emailReseptioneste)->send(new ReceptionnesteMail($data, $client));
            // dd($client);
            return redirect()->route('client.dashboard')->with('message_envoi_a_reseptioneste', 'Email envoyer au receptionniste');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function getchamberdispo(Request $request)
    {
         $checkIn = $request->check_in;
    $checkOut = $request->check_out;

        $ids = DB::table('reservations')->where('check_in', '<', $request->check_out)->where('check_out', '>', $request->check_in)->pluck('chambre_id');
        $chambres = DB::table('chambres')->where('statut', 'Disponible')->whereNotIn('id', $ids)->get();
        $users = User::where('role', 'Client')->where('is_banne', false)->get();
        $Chambres = Chambre::where('statut', 'Disponible')->get();
            return view('reservation.createstep2', compact('chambres','checkIn','checkOut','users', 'Chambres'));
    }
}
