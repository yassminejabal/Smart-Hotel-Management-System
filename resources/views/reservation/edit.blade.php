@extends('layouts.app')
@section('content')

    <div class="w-full p-12">
        <header class="flex justify-between items-end mb-12 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Service de Conciergerie</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Modifier <br>Réservation</h1>
                <p class="text-gray-400 text-sm mt-4 uppercase tracking-[4px]">Dossier : #{{ $reservation->id }}</p>
            </div>
        </header>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="space-y-10">
            @csrf
            @method('PUT') <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
                
                <div class="flex items-center gap-4 mb-10">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-[#b89146] text-xs font-bold">01</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Détails du Client</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    <div class="md:col-span-2">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3 block">Client Existant</label>
                        <select name="client_id" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none cursor-pointer">

                            <option value="" class="bg-[#0a1118]">
                                -- Sélectionner un client --
                            </option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" class="bg-[#0a1118]" {{ old('client_id', $reservation->client_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </section>

            <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>

                <div class="flex items-center gap-4 mb-10 text-[#b89146]">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-xs font-bold">02</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Détails du Séjour</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Check-In</label>
                        <input type="date" name="check_in" value="{{ old('check_in', \Carbon\Carbon::parse($reservation->check_in)->format('Y-m-d')) }}" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Check-Out</label>
                        <input type="date" name="check_out" value="{{ old('check_out', \Carbon\Carbon::parse($reservation->check_out)->format('Y-m-d')) }}" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Nombre d'invités</label>
                        <input type="number" name="invitees" min="1" value="{{ old('invitees', $reservation->invitees) }}" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Chambre</label>
                        <select name="chambre_id" class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none cursor-pointer">
                            <option value="" disabled class="bg-[#0a1118]">-- Choisir --</option>
                            @foreach ($Chambres as $chambre)
                                <option value="{{ $chambre->id }}" class="bg-[#0a1118]" {{ old('chambre_id', $reservation->chambre_id) == $chambre->id ? 'selected' : '' }}>
                                    N°{{ $chambre->number_Chambre }} ({{ $chambre->type }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-[#b89146] uppercase tracking-widest block italic">Prix Total</label>
                        <div class="relative">
                            <input type="number" step="0.01" name="total_price" value="{{ old('total_price', $reservation->total_price) }}" class="w-full p-4 bg-[#b89146]/10 border border-[#b89146]/30 text-[#b89146] font-bold text-lg outline-none">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-bold text-[#b89146]">MAD</span>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Statut & Paiement</label>
                        <div class="flex flex-col gap-2">
                            <select name="status" class="p-3 bg-white/5 border border-white/10 focus:border-[#b89146] text-[10px] font-bold text-white uppercase tracking-widest outline-none">
                                <option value="en_attente" class="bg-[#0a1118]" {{ old('status', $reservation->status) == 'en_attente' ? 'selected' : '' }}>🕒 Attente</option>
                                <option value="confirmee" class="bg-[#0a1118]" {{ old('status', $reservation->status) == 'confirmee' ? 'selected' : '' }}>✅ Confirmée</option>
                                <option value="annulee" class="bg-[#0a1118]" {{ old('status', $reservation->status) == 'annulee' ? 'selected' : '' }}>❌ Annulée</option>
                            </select>
                            
                            <select name="payment_status" class="p-3 bg-white/5 border border-white/10 focus:border-[#b89146] text-[10px] font-bold text-white uppercase tracking-widest outline-none">
                                <option value="En attente" class="bg-[#0a1118]" {{ old('payment_status', $reservation->payment_status) == 'En attente' ? 'selected' : '' }}>💳 En attente</option>
                                <option value="Payé" class="bg-[#0a1118]" {{ old('payment_status', $reservation->payment_status) == 'Payé' ? 'selected' : '' }}>💰 Payé</option>
                                <option value="Échoué" class="bg-[#0a1118]" {{ old('payment_status', $reservation->payment_status) == 'Échoué' ? 'selected' : '' }}>❌ Échoué</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <div class="flex justify-between items-center pt-10 border-t border-white/5">
                <a href="{{ route('reservations.index') }}" class="text-[10px] font-bold text-gray-500 uppercase tracking-[3px] hover:text-red-500 transition-all">← Annuler</a>
                
                <button type="submit" class="bg-[#b89146] text-[#0a1118] px-16 py-6 text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-xl">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

@endsection