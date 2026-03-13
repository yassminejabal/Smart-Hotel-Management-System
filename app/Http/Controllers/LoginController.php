<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(LoginValidation $request)
{
    $data = $request->validated();

    $check = Auth::attempt($data);

    // dd($check);

    if ($check) {

        if (Auth::user()->role === 'Client') {
            return dump('Client');
        }

        if (Auth::user()->role === 'Admin') {
            return dump('Admin');
        }

        if (Auth::user()->role === 'Receptionniste') {
            return view('dachbordReceptionniste');
        }

    } else {
        return redirect()->route('Login.create');
    }
}
    /**
     * Display the specified resource.
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        //
    }
}
