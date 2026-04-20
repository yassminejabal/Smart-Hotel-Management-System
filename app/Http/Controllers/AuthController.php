<?php

namespace App\Http\Controllers;

use App\Http\Requests\inscriptionValidation;
use App\Http\Requests\LoginValidation;
use App\Models\Chambre;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createinscription()
    {
        return view('inscription');
    }


    public function storeinscreption(inscriptionValidation $request)
    {
        $data = $request->validated();
        $data['is_banne'] = false;
        User::create($data);
        return redirect()->route('Login.create');
    }

    public function logincreate()
    {
        return view('login');
    }


    public function Loginstore(LoginValidation $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            if (Auth::user()->is_banne == true) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                $message = 'Votre compte est actuellement désactivé.';
                return back()->with(['is bann' =>$message ]);
            } else {
                return redirect()->route('dach');
            }
        } else {
            return throw new Exception("Error dans login");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Login.create');
    }

    public function main()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('Login.create');
        }
        if ($user->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'Client') {
            return redirect()->route('client.dashboard');
        }
        $data = Chambre::all();
        return view('chambres.dachbordchambres', compact('data'));
    }
    public function toogleban($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        if ($user->is_banne == true) {

            $user->is_banne = false;
            $message = 'Utilisateur débanni avec succès.';
        } else {

            $user->is_banne = true;
            $message = 'Utilisateur banni avec succès.';
        }

        $user->save();

        return back()->with('success', $message);
    }
}
