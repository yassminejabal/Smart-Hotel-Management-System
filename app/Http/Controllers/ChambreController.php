<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChambreValidation;
use App\Models\Chambre;
use App\Models\User;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chambre::all();
        // return view('dachbordReceptionniste',compact('data'));
        return redirect()->route('/Receptionniste',compact($data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChambreValidation $request)
    {
       
      
        
        $newuser = new Chambre();
        // dd($newuser->type);
        $newuser->prix_base = $request->prix_base;
        $newuser->statut = $request->statut;
        $newuser->number_Chambre = $request->number_Chambre;
        $newuser->type = $request->type;
        $check = $newuser->save();
        if ($check) {
            return view('dachbordReceptionniste');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chambre $chambre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chambre $chambre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chambre $chambre)
    {
        //
    }
}



//    public function store(Request $request)
//     {   
//         $produit = new produit();
//         $produit->name = $request->name;
//         $produit->prix = $request->prix;
//         $produit->image_url = $request->image_url;
//         $produit->description = $request->description;
//         $produit->stock = $request->stock;
//         $produit->categorie_id = $request->categorie_id;
//         $produit->save();
//         return redirect()->route('Produits.index');