<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ReservationController extends Controller
{
    public function create()
    {
        $clients = Client::all(); 
        return view('clients.create',compact('clients'));
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function store(ClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }


    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);

        $client->update($request->validated());

        return redirect()->route('clients.index');
    }



    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index');
    }


    public function history($id)
    {
        $client = Client::findOrFail($id);
        $reservations = $client->reservations;

        return view('clients.history', compact('client', 'reservations'));
    }
}
