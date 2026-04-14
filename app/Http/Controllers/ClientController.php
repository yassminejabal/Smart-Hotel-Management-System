<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.createform');
    }
    public function store(ClientRequest $request)
{
    Client::create($request->validated());

    return redirect()->route('reservations.index');
}

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'telephone' => 'nullable|string|unique:clients,telephone,' . $id,
            'adresse' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date'
        ]);

        $client->update($validated);

        return redirect()->route('reservations.create');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('reservations.create');
    }

    public function history($id)
    {
        $client = Client::findOrFail($id);
        $reservations = $client->reservations;

        return view('clients.historique', compact('client', 'reservations'));
    }
}
