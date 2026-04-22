@extends('layouts.paimentreservation')
@section('contant')
    

            <div class="mt-auto pt-10">
                <p class="text-[9px] text-[#b89146] uppercase tracking-[4px] mb-4 italic">Client Actuel</p>
                <p class="text-white text-sm font-playfair font-bold uppercase tracking-widest">{{ $reservation->client->prenom }} {{ $reservation->client->nom }}</p>
            </div>
        </nav>

        <label for="menu-toggle" class="mt-10 text-[10px] text-gray-500 uppercase tracking-[4px] cursor-pointer hover:text-white transition-all flex items-center gap-2">
            <span>× Fermer</span>
        </label>
    </aside>

    <label for="menu-toggle" class="no-print fixed top-10 left-10 flex flex-col gap-2 cursor-pointer z-30 group p-4 bg-black/20 backdrop-blur-md rounded-xl border border-white/5 hover:border-[#b89146]/50 transition-all">
        <span class="w-8 h-[2px] bg-[#b89146] group-hover:w-12 transition-all"></span>
        <span class="w-12 h-[2px] bg-white"></span>
        <span class="w-6 h-[2px] bg-[#b89146] group-hover:w-12 transition-all self-end"></span>
    </label>

    <div class="animate-card hover-float w-full max-w-5xl bg-white shadow-[0_50px_150px_rgba(0,0,0,0.9)] border-t-[8px] border-[#b89146] p-16 relative my-10 z-10">
        
        <div class="absolute top-10 right-10 p-8 opacity-[0.03] pointer-events-none transition-transform duration-1000 hover:scale-125">
            <h1 class="text-[12rem] font-playfair font-black uppercase leading-none">Luxe</h1>
        </div>

        <header class="delay-1 flex justify-between items-end mb-16 border-b border-gray-100 pb-10 relative z-10">
            <div>
                <h1 class="font-playfair text-5xl text-[#0a1118] font-black uppercase tracking-tight mb-2">HOTELO Palace</h1>
                <p class="text-gray-400 text-[11px] mt-2 uppercase tracking-[6px] font-bold">Service Excellence & Facturation</p>
            </div>
            <div class="text-right">
                <span class="text-[10px] text-[#b89146] font-black tracking-[8px] uppercase block mb-2 italic">Dossier Officiel</span>
                <span class="font-playfair text-3xl text-[#0a1118] font-bold">#RES-{{ $reservation->index }}</span>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 relative z-10">
            
            <div class="space-y-12">
                <section class="delay-2 group">
                    <h2 class="text-[11px] font-black text-[#b89146] uppercase tracking-[5px] mb-6 flex items-center gap-3">
                        <span class="w-3 h-[1px] bg-[#b89146]"></span> Profil Client
                    </h2>
                    <div class="bg-gray-50/80 p-8 border-l-4 border-[#b89146] transition-all duration-500 hover:bg-[#0a1118] hover:text-white group-hover:translate-x-2">
                        <p class="text-2xl font-playfair font-black uppercase tracking-tight">{{ $reservation->client->prenom}} {{ $reservation->client->email}}</p>
                        <p class="text-[11px] text-gray-500 mt-4 font-bold tracking-[2px] group-hover:text-gray-400 italic">📞 {{ $reservation->client->name}}</p>
                    </div>
                </section>

                <section class="delay-3 group">
                    <h2 class="text-[11px] font-black text-[#b89146] uppercase tracking-[5px] mb-6">Détails du Séjour</h2>
                    <div class="bg-gray-50/80 p-8 grid grid-cols-2 gap-8 border border-gray-100 transition-all duration-500 hover:shadow-2xl">
                        <div class="col-span-2 flex items-center gap-6 mb-2 border-b border-gray-200 pb-6">
                            <div class="w-16 h-16 bg-[#0a1118] flex items-center justify-center text-[#b89146] font-playfair font-black text-2xl shadow-[0_10px_20px_rgba(0,0,0,0.3)]">
                                {{ $reservation->chambre->number_Chambre}}
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 uppercase tracking-widest font-black mb-1">Hébergement</p>
                                <p class="text-md font-black text-[#0a1118] uppercase tracking-tighter italic text-lg">{{ $reservation->chambre->type}}</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-black mb-2 italic">Arrivée</p>
                            <p class="text-sm font-black text-[#0a1118]">{{ $reservation->check_in}}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase tracking-widest font-black mb-2 italic">Départ</p>
                            <p class="text-sm font-black text-[#0a1118]">{{ $reservation->check_out}}</p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="delay-3 flex flex-col group">
                <h2 class="text-[11px] font-black text-[#b89146] uppercase tracking-[5px] mb-6">Règlement Financier</h2>
                
                <div class="payment-card-luxe flex-1 flex flex-col justify-center items-center p-12 text-center shadow-lg group">
                    
                    <div class="shine-effect"></div>

                    <p class="text-[11px] uppercase tracking-[6px] font-black mb-6 transition-transform duration-500 group-hover:-translate-y-2">
                        Montant Total TTC
                    </p>
                    
                    <h3 class="font-playfair text-6xl font-black text-[#0a1118] mb-10 flex items-baseline gap-3 transition-transform duration-500 group-hover:scale-110">
                        <span class="tracking-tighter">{{ $reservation->total_price }}</span> 
                        <span class="text-2xl text-[#b89146] font-black">MAD</span>
                    </h3>

                    @if($reservation->payment_status == 'paye')
                        <div class="float-status bg-green-600 text-white px-10 py-5 text-[10px] font-black uppercase tracking-[5px] shadow-[0_20px_40px_rgba(22,163,74,0.4)] flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Facture Réglée
                        </div>
                    @else
                        <div class="float-status bg-red-600 text-white px-10 py-5 text-[10px] font-black uppercase tracking-[5px] shadow-[0_20px_40px_rgba(220,38,38,0.4)] flex items-center gap-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            En Attente
                        </div>
                    @endif
                    
                    <div class="mt-8 text-[9px] text-gray-400 uppercase tracking-[3px] font-bold italic opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        Authentifié par Hotelo Systems
                    </div>
                </div>
            </div>
        </div>
        <div class="delay-3 no-print mt-16 pt-10 border-t border-gray-100 flex justify-center relative z-10">
           <form action="{{route('facture.pdf',[$reservation->id])}}" method="POST" target="_blank">
            @csrf
    
    <button type="submit" class="btn-shimmer-auto group flex items-center gap-4 text-white px-20 py-6 text-[12px] font-black uppercase tracking-[6px] hover:scale-105 active:scale-95 transition-all duration-300 shadow-[0_30px_60px_rgba(0,0,0,0.4)] rounded-none border border-[#b89146]/20">
        <svg class="w-6 h-6 group-hover:-translate-y-1 transition-transform text-[#b89146]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
        </svg>
        Imprimer le Reçu
    </button>
</form>
        </div>
    </div>
@endsection