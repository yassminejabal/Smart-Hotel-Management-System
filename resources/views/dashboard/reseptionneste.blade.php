@extends('layouts.app')
@section('content')

<div class="w-full p-12 animate-slide-up">
    <header class="flex justify-between items-end mb-12 relative">
        <div>
            <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Reception Desk</span>
            <h1 class="font-playfair text-white text-6xl leading-tight">Gestion des <br>Arrivées</h1>
        </div>
        <div class="text-right flex flex-col items-end">
            <p class="text-white font-playfair text-xl">{{ now()->format('d F Y') }}</p>
            <p class="text-[#b89146] text-[10px] uppercase tracking-[4px] mt-2 mb-6">Opérations du jour</p>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-white/5 border border-white/10 p-8 backdrop-blur-md relative group hover:border-[#b89146]/50 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-[#b89146] text-[9px] font-bold tracking-[3px] uppercase italic">Total Réservations</h2>
                <svg class="w-5 h-5 text-[#b89146]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </div>
            <p class="text-4xl font-playfair text-white">{{ $totalReservations }}</p>
            <div class="mt-4 h-[1px] bg-[#b89146]/20 w-full"></div>
        </div>

        <div class="bg-white/5 border border-white/10 p-8 backdrop-blur-md relative group hover:border-blue-400/50 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-blue-400 text-[9px] font-bold tracking-[3px] uppercase italic">Clients Inscrits</h2>
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
            </div>
            <p class="text-4xl font-playfair text-white">{{ $totalClients }}</p>
            <div class="mt-4 h-[1px] bg-blue-400/20 w-full"></div>
        </div>

        <div class="bg-white/5 border border-white/10 p-8 backdrop-blur-md relative group hover:border-green-500/50 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-green-500 text-[9px] font-bold tracking-[3px] uppercase italic">Chiffre d'Affaires</h2>
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-4xl font-playfair text-white">{{ $totalRevenue }} <span class="text-xs">MAD</span></p>
            <div class="mt-4 h-[1px] bg-green-500/20 w-full"></div>
        </div>

        <div class="bg-white/5 border border-white/10 p-8 backdrop-blur-md relative group hover:border-red-500/50 transition-all duration-500">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-red-500 text-[9px] font-bold tracking-[3px] uppercase italic">Chambres Disponibles</h2>
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <p class="text-4xl font-playfair text-white">{{ $disponibles }}</p>
            <div class="mt-4 h-[1px] bg-red-500/20 w-full"></div>
        </div>
    </div>

    <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative">
        <div class="absolute top-0 left-0 w-full h-[4px] bg-[#b89146]"></div>
        
        <div class="p-8 border-b border-gray-100 flex justify-between items-center">
            <h2 class="font-playfair text-2xl text-[#0a1118]">Liste des Réservations</h2>
            <div class="flex gap-4">
                <span class="flex items-center gap-2 text-[9px] font-bold text-gray-400 uppercase tracking-[2px]">
                    <span class="w-2 h-2 rounded-full bg-[#b89146] animate-pulse"></span> Flux en direct
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-50">
                        <th class="p-6">Client</th>
                        <th class="p-6">Chambre</th>
                        <th class="p-6">Check-in / Out</th>
                        <th class="p-6">Paiement</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($reservations as $reservation)
                    <tr class="hover:bg-gray-50/80 transition-all duration-300">
                        <td class="p-6">
                            <p class="text-sm font-bold text-[#0a1118]">{{ $reservation->client->name }}</p>
                            <p class="text-[10px] text-gray-400 uppercase tracking-tighter italic">Ref: #{{ $reservation->id }}</p>
                        </td>
                        <td class="p-6">
                            <span class="px-3 py-1 bg-gray-100 text-[#0a1118] text-[10px] font-black rounded-sm border border-gray-200">
                                CH-{{ $reservation->chambre->number_Chambre }}
                            </span>
                        </td>
                        <td class="p-6 text-xs text-gray-600">
                            {{ $reservation->check_in }} <br> 
                            <span class="text-gray-300">→</span> {{ $reservation->check_out }}
                        </td>
                        <td class="p-6">
                            <span class="text-[9px] font-bold uppercase tracking-widest px-3 py-1 rounded-full
                                {{ $reservation->payment_status == 'Payé' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                {{ $reservation->payment_status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                {{ $reservations->links() }}
            </table>
        </div>
    </div>
</div>

<style>
    .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>

@endsection