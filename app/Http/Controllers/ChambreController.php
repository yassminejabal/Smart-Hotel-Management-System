<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChambreValidation;
use App\Models\Chambre;
use App\Models\User;
use Illuminate\Http\Request;

class ChambreController extends Controller
{

    public function index()
    {
        $data = Chambre::all();
        return view('dachbordReceptionniste', compact('data'));
    }

    public function store(ChambreValidation $request)
    {
        $data = $request->validated();
        Chambre::create($data);

        return redirect()->route('chambres.index');
    }



    public function create()
    {
        return redirect()->route('chambers.index');
    }
    public function edit($id)
    {
        $chambre = Chambre::findOrFail($id);
        return view('editChambre', compact('chambre'));
    }

    public function update(Request $request, $id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->update($request->all());
        return redirect()->route('chambers.index');
    }


    public function destroy($id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->delete();
        return redirect()->route('chambers.index');
    }
}
