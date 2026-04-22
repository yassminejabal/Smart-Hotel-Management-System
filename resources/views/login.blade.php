@extends('layouts.login')
@section('contant')
    
         @if(session('is bann'))
    <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded mb-4 text-sm text-center">
        {{ session('is bann') }}
    </div>
@endif

        <form action="{{ route('Login.store') }}" method="POST" class="space-y-8" autocomplete="off">
            @csrf
            
            <div class="space-y-3">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Identifiant E-mail</label>
                <input type="email" name="email" placeholder="admin@hotelo.com" required
                    class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
            </div>

            <div class="space-y-3">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
            </div>

            <button type="submit" 
                class="w-full py-5 bg-[#b89146] text-[#0a1118] text-[11px] font-bold uppercase tracking-[4px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-2xl">
                S'identifier au Système
            </button>
        </form>
@endsection
