<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalReservations = Reservation::count();
        $disponibles = Chambre::where('statut', 'Disponible')->count();
        $occupees = Chambre::where('statut', 'Occupee')->count();
        $users =  User::paginate(10);
        return view('dashboard.admin', compact('users', 'totalReservations', 'disponibles', 'occupees'));
    }
        public function reseptionneste()
        {
            $totalReservations = Reservation::count();
            $totalClients = User::where('role', 'client')->count();
            $totalRevenue = Reservation::where('payment_status', 'Payé')->sum('total_price');
            $disponibles = Chambre::where('statut', 'disponible')->count();
            $reservations = Reservation::with(['client', 'chambre'])->paginate(10);
            return view('dashboard.reseptionneste', compact(
                'totalReservations',
                'totalClients',
                'totalRevenue',
                'disponibles',
                'reservations'
            ));
        }

    public function client()
    {
        $client = Auth::user();

        $reservations = Reservation::with('chambre')->where('client_id', $client->id)->paginate(10);

        $reservationsActives = Reservation::where('client_id', $client->id)->where('status', 'confirmee')->count();

        $totalSejours = Reservation::where('client_id', $client->id)->count();

        return view('dashboard.client', compact('client', 'reservations', 'reservationsActives', 'totalSejours'));
    }
}
