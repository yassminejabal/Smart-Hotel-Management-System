@extends('layouts.app')

@section('content')
<div class="w-full p-12 animate-slide-up">
    <header class="flex justify-between items-end mb-12 relative">
        <div>
            <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Service de Conciergerie</span>
            <h1 class="font-playfair text-white text-6xl leading-tight">Modifier <br>le Profil</h1>
            <p class="text-gray-400 text-sm mt-4 uppercase tracking-[4px]">Client : #{{ $client->id }}</p>
        </div>
        <div class="text-right">
            <p class="text-white font-playfair text-xl">{{ now()->format('d F Y') }}</p>
            <p class="text-[#b89146] text-[10px] uppercase tracking-[4px] mt-2">Mise à jour client</p>
        </div>
    </header>

    <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-10">
        @csrf
        @method('PUT')

        <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative group hover:border-[#b89146]/30 transition-all duration-500">
            <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
            
            <div class="flex items-center gap-4 mb-10">
                <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-[#b89146] text-xs font-bold shadow-[0_0_15px_rgba(184,145,70,0.3)]">01</span>
                <h2 class="font-playfair text-2xl text-white tracking-wide">Détails de l'Identité</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Nom Complet</label>
                    <input type="text" name="name" value="{{ old('name', $client->name) }}" 
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all">
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse Email</label>
                    <input type="email" name="email" value="{{ old('email', $client->email) }}" 
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all">
                </div>
                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Password</label>
                    <input type="email" name="password"
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all">
                </div>
            </div>
        </section>

        <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative group hover:border-[#b89146]/30 transition-all duration-500">
            <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>

            <div class="flex items-center gap-4 mb-10 text-[#b89146]">
                <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-xs font-bold shadow-[0_0_15px_rgba(184,145,70,0.3)]">02</span>
                <h2 class="font-playfair text-2xl text-white tracking-wide">Contact & Statut</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}" 
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Date de Naissance</label>
                    <input type="date" name="date_naissance" value="{{ old('date_naissance', $client->date_naissance) }}" 
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                </div>

                <div class="md:col-span-3 space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse Physique</label>
                    <input type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}" 
                        class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                </div>
            </div>
        </section>

        <div class="flex justify-between items-center pt-10 border-t border-white/5">
            <a href="{{ route('clients.index') }}" class="group flex items-center gap-3">
                <span class="text-[10px] font-bold text-gray-500 uppercase tracking-[3px] group-hover:text-white transition-all">← Annuler</span>
            </a>
            
            <button type="submit" class="bg-[#b89146] text-[#0a1118] px-16 py-6 text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-[0_20px_50px_rgba(184,145,70,0.2)]">
                Sauvegarder & Activer
            </button>
        </div>
    </form>
</div>

<style>
    .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
        opacity: 0.5;
        cursor: pointer;
    }
</style>
@endsection