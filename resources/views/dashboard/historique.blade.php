@extends('layouts.app')
@section('content')

    <main class="ml-72 flex-1 p-20">
        <header class="mb-20 animate-fade" style="animation-delay: 0.2s">
            <p class="text-[#b89146] text-[11px] font-bold uppercase tracking-[8px] mb-4 italic">Memories & Stays</p>
            <h1 class="font-playfair text-white text-7xl leading-tight uppercase tracking-tighter">Votre Historique</h1>
        </header>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">
            @foreach($client->reservations as $res)
            <div class="animate-fade group relative bg-white/5 border border-white/10 p-10 transition-all duration-700 hover:border-[#b89146] hover:bg-white/[0.07] hover:-translate-y-2">
                <div class="absolute top-10 right-10">
                    @if($res->payment_status == 'paye')
                        <span class="px-5 py-1.5 border border-green-500/40 text-green-400 text-[9px] uppercase tracking-[4px] font-bold bg-green-500/5">Payé</span>
                    @else
                        <span class="px-5 py-1.5 border border-red-500/40 text-red-400 text-[9px] uppercase tracking-[4px] font-bold bg-red-500/5">En Attente</span>
                    @endif
                </div>
                @endforeach

                <p class="text-[10px] text-[#b89146] font-bold tracking-[5px] uppercase mb-6 italic opacity-70">Séjour #{{ str_pad($res->id, 4, '0', STR_PAD_LEFT) }}</p>
                <h3 class="font-playfair text-4xl text-white mb-8 uppercase tracking-wide group-hover:text-[#b89146] transition-colors">{{ $res->chambre->type }}</h3>
                
                <div class="grid grid-cols-2 gap-10 mb-10 border-y border-white/10 py-8">
                    <div>
                        <p class="text-[9px] text-gray-500 uppercase tracking-widest mb-2 font-bold">Période</p>
                        <p class="text-sm font-medium tracking-wide">Du {{ $res->check_in }}<br>Au {{ $res->check_out }}</p>
                    </div>
                    <div>
                        <p class="text-[9px] text-gray-400 uppercase tracking-widest mb-2 font-bold">Montant</p>
                        <p class="text-xl font-bold text-[#b89146] tracking-tighter">{{ number_format($res->total_price, 2) }} DH</p>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-[10px] text-gray-400 group-hover:border-[#b89146] group-hover:text-white transition-all">
                            {{ $res->chambre->number_Chambre }}
                        </div>
                        <span class="text-[9px] text-gray-500 uppercase tracking-widest">Numéro de Suite</span>
                    </div>
                    <a href="{{ route('reservations.paiement', $res->id) }}" class="text-[10px] font-bold uppercase tracking-[4px] text-[#b89146] hover:text-white transition-all underline underline-offset-8">Détails Facture →</a>
                </div>
            </div>
           
        </div>
    </main>

</body>
</html>

