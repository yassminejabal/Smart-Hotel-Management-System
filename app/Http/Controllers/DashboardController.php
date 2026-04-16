<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalReservations = Reservation::count();
        $disponibles = Chambre::where('statut', 'Disponible')->count();
        $occupees = Chambre::where('statut', 'Occupee')->count();
        $clients =  Client::all();
        // dd($clients[0]->nom);
        return view('dashboard.admin', compact('clients','totalReservations', 'disponibles', 'occupees'));
    }


    public function client()
    {
        $client = Auth::user();

        $reservations = Reservation::with('chambre')
            ->where('client_id', $client->id)
            ->latest()
            ->get();
            
        $reservationsActives = Reservation::where('client_id', $client->id)
            ->where('status', 'confirmee')
            ->count();

        $totalSejours = Reservation::where('client_id', $client->id)->count();

        return view('dashboard.client', compact(
            'client',
            'reservations',
            'reservationsActives',
            'totalSejours'
        ));
    }
}
