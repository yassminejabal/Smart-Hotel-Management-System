@extends('layouts.app')

@section('content')

    <div class="w-full p-12 animate-slide-up">
        <header class="flex justify-between items-end mb-12 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Suite Management</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Modifier <br>Chambre</h1>
            </div>
            <div class="text-right hidden md:block">
                <div class="w-16 h-[2px] bg-[#b89146] ml-auto mb-4"></div>
                <p class="text-gray-400 text-[10px] uppercase tracking-[4px]">Hébergement de Luxe</p>
                <p class="text-[#b89146] text-xs mt-2 italic">Ref: #{{ $chambre->number_Chambre }}</p>
            </div>
        </header>

        <form action="{{ route('chambers.update', $chambre->id) }}" method="POST" class="space-y-10">
            @csrf
            @method('PUT')

            <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
                
                <div class="flex items-center gap-4 mb-12">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-[#b89146] text-xs font-bold italic">RM</span>
                    <h2 class="font-playfair text-2xl text-white tracking-wide">Configuration de l'Hébergement</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">N° de Chambre</label>
                        <input type="number" name="number_Chambre" value="{{ old('number_Chambre', $chambre->number_Chambre) }}" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all placeholder:text-gray-600">
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Catégorie</label>
                        <select name="type" required
                            class="w-full p-4 bg-[#0a1118] border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all cursor-pointer">
                            <option value="Simple" {{ $chambre->type == 'Simple'}}>Simple</option>
                            <option value="Double" {{ $chambre->type == 'Double'}}>Double</option>
                            <option value="Suite" {{ $chambre->type == 'Suite'}}>Suite de Prestige</option>
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Disponibilité actuelle</label>
                        <select name="statut" required
                            class="w-full p-4 bg-[#0a1118] border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all cursor-pointer">
                            <option value="Disponible" {{ $chambre->statut == 'Disponible'}}>Disponible</option>
                            <option value="Occupee" {{ $chambre->statut == 'Occupee'}}>Occupée</option>
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Prix par Nuité (MAD)</label>
                        <input type="number" name="prix_base" value="{{ old('prix_base', $chambre->prix_base) }}" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none transition-all">
                    </div>

                </div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-12 border-t border-white/5 mt-12">
                    
                    <a href="{{ route('chambers.index') }}" 
                        class="group flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-[3px] hover:text-white transition-all">
                        <span class="group-hover:-translate-x-1 transition-transform">←</span>
                        Retour à la liste
                    </a>
                    
                    <button type="submit" class="w-full md:w-auto py-6 px-20 bg-[#b89146] text-[#0a1118] text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-[0_20px_40px_rgba(184,145,70,0.2)]">
                        Confirmer les Modifications
                    </button>
                </div>
            </section>
        </form>
    </div>

@endsection