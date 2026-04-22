@extends('layouts.app')
@section('content')

    <div class="w-full p-12">
        <header class="flex justify-between items-end mb-12">
            <div>
                <p class="text-[#b89146] text-[10px] font-bold uppercase tracking-[6px] mb-3 italic">Inventory Management</p>
                <h1 class="font-playfair text-white text-6xl leading-tight">Chambres</h1>
            </div>
        </header>

        <section class="bg-white/5 border border-white/10 p-8 backdrop-blur-md mb-12 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>
            
            <h2 class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mb-8 italic text-left">Nouvelle Unité</h2>
            
            <form action="{{route('Chambre.store')}}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">N° Chambre</label>
                        <input name="number_Chambre" type="number" placeholder="101" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:outline-none focus:border-[#b89146] text-sm text-white placeholder:text-gray-600 transition-all">
                    </div>
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Type</label>
                        <select name="type" class="w-full p-4 bg-white/5 border border-white/10 focus:outline-none focus:border-[#b89146] text-sm cursor-pointer text-white transition-all">
                            <option value="Simple" class="bg-[#0a1118]">Simple</option>
                            <option value="Double" class="bg-[#0a1118]">Double</option>
                            <option value="Suite" class="bg-[#0a1118]">Suite</option>
                        </select>
                    </div>
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Statut</label>
                        <select name="statut" class="w-full p-4 bg-white/5 border border-white/10 focus:outline-none focus:border-[#b89146] text-sm cursor-pointer text-white transition-all">
                            <option value="Disponible" class="bg-[#0a1118]">Disponible</option>
                            <option value="Occupee" class="bg-[#0a1118]">Occupee</option>
                        </select>
                    </div>
                    
                    <div class="space-y-3">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prix (DH)</label>
                        <input name="prix_base" type="number" placeholder="800" required
                            class="w-full p-4 bg-white/5 border border-white/10 focus:outline-none focus:border-[#b89146] text-sm text-white placeholder:text-gray-600 transition-all">
                    </div>
                </div>
                
                <div class="flex justify-end pt-4 border-t border-white/5">
                    <button type="submit" class="bg-[#b89146] text-[#0a1118] px-12 py-4 text-[11px] font-bold uppercase tracking-[2px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-[0_10px_30px_rgba(184,145,70,0.2)]">
                        Enregistrer la Chambre
                    </button>
                </div>
            </form>
        </section>

        <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.4)] overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-[6px] bg-[#b89146]"></div>
            
            <div class="max-h-[500px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left border-collapse min-w-[1000px]">
                    <thead class="sticky top-0 bg-white z-10 shadow-sm">
                        <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-100">
                            <th class="p-8">NUMÉRO</th>
                            <th class="p-8">TYPE</th>
                            <th class="p-8">PRIX</th>
                            <th class="p-8">STATUT</th>
                            <th class="p-8 text-right">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-gray-900">
                        @foreach($data as $chambre)
                        <tr class="hover:bg-gray-50/50 transition duration-300">
                            <td class="p-8 font-bold text-[#0a1118]">#{{ $chambre->number_Chambre }}</td>
                            <td class="p-8">
                                <span class="text-[10px] font-black tracking-widest uppercase">{{ $chambre->type }}</span>
                            </td>
                            <td class="p-8 font-black text-sm">
                                {{ $chambre->prix_base}} <span class="text-[10px] text-[#b89146]">DH</span>
                            </td>
                            <td class="p-8">
                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase {{ $chambre->statut == 'Disponible' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">
                                    {{ $chambre->statut }}
                                </span>
                            </td>
                            <td class="p-8 text-right">
                                <div class="flex justify-end gap-3">
                                    <a href="{{route('chambers.edit',$chambre->id)}}" class="p-2 bg-gray-50 text-gray-400 hover:text-[#b89146] hover:bg-[#0a1118] transition-all rounded-full" title="Modifier">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 113.536 3.536L12 14.207l-5 1 1-5 7.232-7.232z" stroke-width="2"/></svg>
                                    </a>
                                    
                                    <form action="{{ route('chambers.destroy', $chambre->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-gray-50 text-gray-400 hover:text-red-600 hover:bg-red-50 transition-all rounded-full" title="Supprimer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

@endsection