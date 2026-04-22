<?php
namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Mail\ClientMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'client')->paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        User::create($data);
        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        $client = User::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        // dd($request);
        $client = User::findOrFail($id);
        $data = $request->validated();
        $data['is_banne'] = false;
        $data['role'] = 'Client';
        $client->update($data);
        return redirect()->route('clients.index');
    }
    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return redirect()->back();
    }
    public function sendEmail($id){
        $client = User::findOrFail($id);
        try {
            Mail::to($client->email)->send(new ClientMail($client));
            
            return redirect()->back()->with('message', 'Email envoiye avec sucsses !');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Erreur dans lenvoi : ' . $th->getMessage());
        }
    }
}