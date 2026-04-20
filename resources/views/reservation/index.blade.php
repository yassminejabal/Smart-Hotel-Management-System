@extends('layouts.app')
@section('content')

    <div class="w-full flex-1 p-12 overflow-x-hidden">
        
        <header class="flex justify-between items-end mb-12">
            <div>
                <p class="text-[#b89146] text-[10px] font-bold uppercase tracking-[6px] mb-3 italic">Administration Excellence</p>
                <h1 class="font-playfair text-white text-6xl leading-tight">Dashboard</h1>
            </div>
            <a href="{{ route('reservations.create') }}" class="bg-[#b89146] text-[#0a1118] px-10 py-5 text-[11px] font-bold uppercase tracking-[4px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-[0_20px_50px_rgba(184,145,70,0.3)]">
                + Nouvelle Réservation 
            </a>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white/5 border border-white/10 p-6 backdrop-blur-md">
                <p class="text-[10px] font-bold text-green-400 uppercase tracking-widest mb-2">✅ Confirmées</p>
                <h3 class="text-3xl font-playfair text-white">{{ $reservations->where('status', 'confirmee')->count() }}</h3>
            </div>
            <div class="bg-white/5 border border-white/10 p-6 backdrop-blur-md">
                <p class="text-[10px] font-bold text-orange-400 uppercase tracking-widest mb-2">🕒 En Attente</p>
                <h3 class="text-3xl font-playfair text-white">{{ $reservations->where('status', 'en_attente')->count() }}</h3>
            </div>
            <div class="bg-white/5 border border-white/10 p-6 backdrop-blur-md">
                <p class="text-[10px] font-bold text-red-400 uppercase tracking-widest mb-2">❌ Annulées</p>
                <h3 class="text-3xl font-playfair text-white">{{ $reservations->where('status', 'annulee')->count() }}</h3>
            </div>
        </div>

        <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.4)] overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-[6px] bg-[#b89146]"></div>
            
            <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left border-collapse min-w-[1200px]">
                    <thead class="sticky top-0 bg-white z-10 shadow-sm">
                        <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-100">
                            <th class="p-8">Client</th>
                            <th class="p-8">Suite & Type</th>
                            <th class="p-8">Séjour</th>
                            <th class="p-8">Finance</th>
                            <th class="p-8 text-center">Paiement</th>
                            <th class="p-8 text-center">État Actuel</th>
                            <th class="p-8 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($reservations as $reservation)
                        <tr class="hover:bg-gray-50/50 transition duration-300">
                            <td class="p-8">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 rounded-full bg-[#0a1118] flex items-center justify-center text-[#b89146] font-bold text-xs border border-[#b89146]/30 uppercase">
                                    </div>
                                   <p class="font-bold text-[#0a1118] text-sm uppercase tracking-tight">
                                        {{ $reservation->client->name }}
                                    </p>
                                </div>
                            </td>
                            <td class="p-8">
                                <div class="flex items-center gap-4">
                                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=100" class="w-16 h-10 object-cover rounded" alt="Suite">
                                    <div>
                                        <span class="block text-[#0a1118] text-[10px] font-black tracking-widest uppercase">Suite {{ $reservation->chambre->number_Chambre }}</span>
                                        <span class="text-[9px] text-[#b89146] font-bold uppercase italic">{{ $reservation->chambre->type }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="p-8">
                                <div class="flex flex-col gap-1 text-[11px]">
                                    <span class="text-[#0a1118] font-bold">Du: {{ $reservation->check_in }}</span>
                                    <span class="text-gray-400 font-medium italic">Au: {{ $reservation->check_out }}</span>
                                </div>
                            </td>

                            <td class="p-8">
                                <p class="font-black text-[#0a1118] text-sm">{{ $reservation->total_price }} <span class="text-[10px] text-[#b89146]">DH</span></p>
                            </td>

                        <td class="p-8">



                            <td class="p-8">
    <form action="{{ route('reservations.updateStatuspaiment', $reservation->id) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <select name="payment_status" onchange="this.form.submit()" 
            class="appearance-none w-full py-2 px-4 text-[9px] font-bold uppercase tracking-widest rounded-full text-center cursor-pointer transition-all border-2
            {{ $reservation->payment_status == 'Payé' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
            {{ $reservation->payment_status == 'Échoué' ? 'bg-red-50 text-red-700 border-red-200' : '' }}
            {{ $reservation->payment_status == 'En attente' ? 'bg-orange-50 text-orange-700 border-orange-200' : '' }}">
            
            <option value="En attente" {{ $reservation->payment_status == 'En attente' ? 'selected' : '' }}>💳 En attente</option>
            <option value="Payé" {{ $reservation->payment_status == 'Payé' ? 'selected' : '' }}>💰 Payé</option>
            <option value="Échoué" {{ $reservation->payment_status == 'Échoué' ? 'selected' : '' }}>❌ Échoué</option>
            
        </select>
    </form>
</td>
                        </td>
                      <td class="p-8">
    <form action="{{ route('reservations.updatePaymentStatusReservationConfirmation', $reservation->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <select name="status" onchange="this.form.submit()" 
            class="appearance-none w-full py-2 px-4 text-[9px] font-bold uppercase tracking-widest rounded-full text-center cursor-pointer transition-all border-2
            {{ $reservation->status == 'confirmee' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
            {{ $reservation->status == 'annulee' ? 'bg-red-50 text-red-700 border-red-200' : '' }}
            {{ $reservation->status == 'en_attente' ? 'bg-orange-50 text-orange-700 border-orange-200' : '' }}">
            
            <option value="en_attente" {{ $reservation->status == 'en_attente' ? 'selected' : '' }}>🕒 En attente</option>
            <option value="confirmee" {{ $reservation->status == 'confirmee' ? 'selected' : '' }}>✅ Confirmée</option>
            <option value="annulee" {{ $reservation->status == 'annulee' ? 'selected' : '' }}>❌ Annulée</option>
        </select>
    </form>
</td>

                            <td class="p-8 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{ route('reservations.paiement', $reservation->id) }}" class="p-2 bg-gray-50 text-gray-400 hover:text-green-600 hover:bg-green-100 transition-all rounded-full border border-gray-100" title="Détails & Paiement">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    </a>

                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="p-2 bg-gray-50 text-gray-400 hover:text-[#b89146] hover:bg-[#0a1118] transition-all rounded-full">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 113.536 3.536L12 14.207l-5 1 1-5 7.232-7.232z" stroke-width="2"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> @endsection 