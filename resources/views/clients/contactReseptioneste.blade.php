@extends('layouts.app')

@section('content')
<main class="ml-72 flex-1 p-20 bg-[#0a0a0a] min-h-screen">
    <!-- Header -->
    <header class="mb-20 animate-fade">
        <p class="text-[#b89146] text-[11px] font-bold uppercase tracking-[8px] mb-4 italic">
            Conciergerie & Support
        </p>
        <h1 class="font-playfair text-white text-7xl leading-tight uppercase tracking-tighter">
            Contact Réception
        </h1>
    </header>

    <div class="max-w-5xl">
        <form action="{{ route('contactReseptsioneste.send') }}" method="POST" class="animate-fade bg-white/5 border border-white/10 p-12 relative overflow-hidden">
           
           {{-- {{ route('contact.send') }} --}}
            @csrf
            
            <!-- Section 01: Votre Message -->
            <div class="mb-12">
                

                <div class="grid grid-cols-1 gap-8">
                    <!-- Objet de la demande -->
                    

                    <!-- Message -->
                    <div class="mb-12">
                        <div class="flex items-center gap-4 mb-10">
                            <span class="w-10 h-10 rounded-full border border-[#b89146] flex items-center justify-center text-[#b89146] text-xs font-bold">01</span>
                            <h2 class="font-playfair text-3xl text-white uppercase tracking-widest">Détails du séjour</h2>
                        </div>

                        <div class="bg-white/5 border border-white/10 p-8">
                            <p class="text-white/60 font-light text-xl leading-relaxed">
                                Je souhaiterais planifier mon séjour du 
                                <input type="date" name="check_in" 
                                    class="bg-transparent border-b border-[#b89146]/50 text-[#b89146] px-2 outline-none focus:border-[#b89146] transition-colors cursor-pointer appearance-none">
                                au 
                                <input type="date" name="check_out" 
                                    class="bg-transparent border-b border-[#b89146]/50 text-[#b89146] px-2 outline-none focus:border-[#b89146] transition-colors cursor-pointer appearance-none">.
                            </p>
                            <span class="text-[9px] text-gray-500 uppercase tracking-[2px] mt-4 block italic">
                                * Veuillez sélectionner vos dates de présence
                            </span>
                        </div>
                    </div>

                    
                </div>
            </div>

            <!-- Footer du formulaire avec le nouveau bouton -->
            <div class="flex justify-end items-center mt-12 pt-8 border-t border-white/10">
                <button type="submit" 
                    class="bg-[#b89146] text-black text-[11px] font-bold uppercase tracking-[4px] px-12 py-5 hover:bg-white transition-all duration-500 flex items-center gap-4 group">
                    Envoyer le message
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-2 transition-transform">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>

            <!-- Décoration en arrière-plan -->
            <div class="absolute -bottom-10 -right-10 opacity-5 pointer-events-none">
                <h3 class="text-white text-[150px] font-playfair italic select-none">Contact</h3>
            </div>
        </form>
    </div>
</main>
@endsection