<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Models\Chambre;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function main()
    {
        $data = Chambre::all();
        
        return view('dachbordReceptionniste', compact('data'));
    }

public function store(LoginValidation $request)
{
    $data = $request->validated();
    
    
    $check = Auth::attempt($data);
    // dd($data);
    
    if ($check) {
        
        return redirect()->route('dach');
        

    } else {
        return redirect()->route('Login.create');
    }
}

}
