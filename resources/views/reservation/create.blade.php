@extends('layouts.app')
@section('content')

    <div class="w-full p-12">
        <header class="flex justify-between items-end mb-12 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Service de Conciergerie</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Nouvelle <br>Réservation</h1>
            </div>
        </header>

        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-10">
            @csrf

            <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
                
                <div class="flex items-center gap-4 mb-10">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-[#b89146] text-xs font-bold">01</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Détails du Client</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3 block">Sélectionner un Client Existant</label>
                        <select name="client_id" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none cursor-pointer">

                            <option value="" class="bg-[#0a1118]">
                                -- Nouveau Client / Remplir ci-dessous --
                            </option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" class="bg-[#0a1118]">
                                    {{ $user->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
            <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>

                <div class="flex items-center gap-4 mb-10 text-[#b89146]">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-xs font-bold">02</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Détails du Séjour</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Check-In</label>
                        <input type="date" name="check_in" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Check-Out</label>
                        <input type="date" name="check_out" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Nombre d'invités</label>
                        <input type="number" name="invitees" min="1" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Chambre</label>
                        <select name="chambre_id" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none cursor-pointer">
                            <option value="" disabled selected class="bg-[#0a1118]">-- Choisir --</option>
                            @foreach ($Chambres as $chambre)
                                <option value="{{ $chambre->id }}" class="bg-[#0a1118]">
                                    N°{{ $chambre->number_Chambre }} ({{ $chambre->type }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-[#b89146] uppercase tracking-widest block italic">Prix Total</label>
                        <div class="relative">
                            <input type="number" step="0.01" name="total_price" class="w-full p-4 bg-[#b89146]/10 border border-[#b89146]/30 text-[#b89146] font-bold text-lg outline-none">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-bold text-[#b89146]">MAD</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Statut & Paiement</label>
                        <div class="flex flex-col gap-2">
                            <select name="status" class="p-3 bg-white/5 border border-white/10 focus:border-[#b89146] text-[10px] font-bold text-white uppercase tracking-widest outline-none">
                                <option value="en_attente" class="bg-[#0a1118]">🕒 Attente</option>
                                <option value="confirmee" class="bg-[#0a1118]">✅ Confirmée</option>
                                <option value="annulee" class="bg-[#0a1118]">❌ annulee</option>
                            </select>
                            
                            <select name="payment_status" class="p-3 bg-white/5 border border-white/10 focus:border-[#b89146] text-[10px] font-bold text-white uppercase tracking-widest outline-none">
                                <option value="En attente" class="bg-[#0a1118]">💳 En attente</option>
                                <option value="Payé" class="bg-[#0a1118]">💰 Payé</option>
                                <option value="Échoué" class="bg-[#0a1118]">❌ Échoué</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <div class="flex justify-between items-center pt-10 border-t border-white/5">
                <a href="{{ route('reservations.index') }}" class="text-[10px] font-bold text-gray-500 uppercase tracking-[3px] hover:text-red-500 transition-all">← Annuler</a>
                
                <button type="submit" class="bg-[#b89146] text-[#0a1118] px-16 py-6 text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-xl">
                    Créer la Réservation
                </button>
            </div>
        </form>
    </div>

@endsection