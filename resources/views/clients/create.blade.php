@extends('layouts.app')
@section('content')

    <div class="w-full p-12">
        <header class="flex justify-between items-end mb-12 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Guest Registration</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Nouveau <br>Client</h1>
            </div>
            <div class="text-right hidden md:block">
                <div class="w-16 h-[2px] bg-[#b89146] ml-auto mb-4"></div>
                <p class="text-gray-400 text-[10px] uppercase tracking-[4px]">Membre du Palace</p>
            </div>
        </header>

        <form action="{{ route('clients.store') }}" method="POST" class="space-y-10">
            @csrf

            <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
                
                <div class="flex items-center gap-4 mb-12">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-[#b89146] text-xs font-bold italic">NB</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Informations Personnelles</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Nom de famille</label>
                        <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Jabal" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Ex: Yassmine" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse E-mail</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="y.jabal@hotelo.com" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Téléphone</label>
                        <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="+212 6..." required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3 md:col-span-2">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse de Résidence</label>
                        <input type="text" name="adresse" value="{{ old('adresse') }}" placeholder="Rue de la Liberté, Marrakech" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3 md:col-span-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Date de Naissance</label>
                        <input type="date" name="date_naissance" value="{{ old('date_naissance') }}" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all cursor-pointer">
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-12 border-t border-white/5 mt-12">
                    </a>
                    
                    <button type="submit" class="w-full md:w-auto py-6 px-20 bg-[#b89146] text-[#0a1118] text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-[0_20px_40px_rgba(184,145,70,0.2)]">
                        Créer le Profil Client
                    </button>
                </div>
            </section>
        </form>
    </div>

@endsection