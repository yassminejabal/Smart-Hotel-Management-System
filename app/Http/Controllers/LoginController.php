<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Models\Chambre;
use App\Models\login;
use Error;
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
        $user = Auth::user();
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Client') {
            return redirect()->route('client.dashboard');
        }
        $data = Chambre::all();
        
        return view('dachbordReceptionniste', compact('data'));
    }

    public function store(LoginValidation $request)
    {
        
        $data = $request->validated();
        $check = Auth::attempt($data);
        
        if ($check) {
            return redirect()->route('dach');
        } else {
            return abort("Eroor login");
        }
    }
}