@extends('layouts.app')

@section('content')
@if (session('message_envoi_a_reseptioneste'))
    <div class="mb-10 animate-fade-down">
        <div class="bg-[#b89146]/10 border border-[#b89146]/30 p-8 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <div class="w-12 h-12 rounded-full border border-[#b89146] flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#b89146" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div>
                    <p class="text-[#b89146] text-[10px] font-bold uppercase tracking-[5px] mb-1 italic">
                        Confirmation
                    </p>
                    <p class="text-white text-sm font-light tracking-wide">
                        {{ session('message_envoi_a_reseptioneste') }}
                    </p>
                </div>
            </div>
            <span class="text-[9px] text-[#b89146] border border-[#b89146]/20 px-3 py-1 uppercase tracking-[2px] font-bold">
                Envoyé
            </span>
        </div>
    </div>
@endif
    <main class="ml-72 flex-1 p-20">
        <!-- Header avec bouton à droite -->
        <header class="mb-20 animate-fade flex justify-between items-end">
            <div>
                <p class="text-[#b89146] text-[11px] font-bold uppercase tracking-[8px] mb-4 italic">
                    Memories & Stays
                </p>
                <h1 class="font-playfair text-white text-7xl leading-tight uppercase tracking-tighter">
                    Votre Historique
                </h1>
            </div>

            <div class="mb-2">
                    <a href="{{ route('reservations.contactReseptioneste') }}" 
                    class="px-8 py-4 bg-transparent border border-[#b89146]/40 text-[#b89146] text-[10px] font-bold uppercase tracking-[4px] hover:bg-[#b89146] hover:text-white transition-all duration-500 flex items-center gap-3 group/btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>
                        </svg>
                        Écrire à la réception
                    </a>
                </div>
        </header>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
            @foreach($reservations as $res)
            <div class="animate-fade group relative bg-white/5 border border-white/10 p-10 transition-all duration-700 hover:border-[#b89146] hover:bg-white/[0.07] hover:-translate-y-2">

                <!-- Badge de Statut -->
                <div class="absolute top-10 right-10">
                    @if($res->payment_status == 'Payé')
                        <span class="px-5 py-1.5 border border-green-500/40 text-green-400 text-[9px] uppercase tracking-[4px] font-bold bg-green-500/5">
                            Payé
                        </span>
                    @else
                        <span class="px-5 py-1.5 border border-red-500/40 text-red-400 text-[9px] uppercase tracking-[4px] font-bold bg-red-500/5">
                            En Attente
                        </span>
                    @endif
                </div>

                <p class="text-[10px] text-[#b89146] font-bold tracking-[5px] uppercase mb-6 italic opacity-70">
                    Séjour #{{ $res->id }}
                </p>

                <h3 class="font-playfair text-4xl text-white mb-8 uppercase tracking-wide group-hover:text-[#b89146] transition-colors">
                    {{ $res->chambre->type }}
                </h3>

                <div class="grid grid-cols-2 gap-10 mb-10 border-y border-white/10 py-8">
                    <div>
                        <p class="text-[9px] text-gray-500 uppercase tracking-widest mb-2 font-bold">Période</p>
                        <p class="text-sm font-medium tracking-wide text-white/80">
                            Du {{ $res->check_in }}<br>
                            Au {{ $res->check_out }}
                        </p>
                    </div>

                    <div>
                        <p class="text-[9px] text-gray-400 uppercase tracking-widest mb-2 font-bold">Montant</p>
                        <p class="text-xl font-bold text-[#b89146] tracking-tighter">
                            {{$res->total_price }}DH
                        </p>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-[10px] text-gray-400 group-hover:border-[#b89146] group-hover:text-white transition-all">
                            {{ $res->chambre->number_Chambre }}
                        </div>
                        <span class="text-[9px] text-gray-500 uppercase tracking-widest">
                            Numéro de Suite
                        </span>
                    </div>

                    <a href="{{ route('reservations.paiement', $res->id) }}"
                       class="text-[10px] font-bold uppercase tracking-[4px] text-[#b89146] hover:text-white transition-all underline underline-offset-8">
                        Détails Facture →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $reservations->links() }}
        </div>
    </main>
@endsection