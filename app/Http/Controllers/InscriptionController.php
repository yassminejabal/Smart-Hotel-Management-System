<?php

namespace App\Http\Controllers;

use App\Http\Requests\inscriptionValidation;
use App\Http\Requests\LoginValidation;
use App\Models\inscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('inscription');
    }



    public function store(inscriptionValidation $request)
    {
         $data = $request->validated();
         User::create($data);
        
         return redirect()->route('Login.create');
    }


    public function logout(Request $request)
{
    Auth::logout(); 

    $request->session()->invalidate(); 

    $request->session()->regenerateToken();

            return redirect()->route('Login.create');

}
}


    
