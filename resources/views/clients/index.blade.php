@extends('layouts.app')

@section('content')
<div class="w-full p-12 animate-slide-up">
    <header class="flex justify-between items-end mb-12 relative">
        <div>
            <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Reception Desk</span>
            <h1 class="font-playfair text-white text-6xl leading-tight">Liste des <br>Clients</h1>
        </div>
        <div class="text-right">
            <a href="{{ route('clients.create') }}" class="group relative inline-flex items-center gap-3 bg-[#b89146] text-white px-6 py-3 transition-all duration-300">
                <span class="text-[10px] font-bold uppercase tracking-[2px]">Ajouter un Client</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </a>
        </div>
    </header>

    <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative">
        <div class="absolute top-0 left-0 w-full h-[4px] bg-[#b89146]"></div>
@if(session('message'))
    <div class="mb-8 overflow-hidden rounded-xl border border-emerald-500/30 bg-emerald-950/20 backdrop-blur-md shadow-lg shadow-emerald-500/10">
        <div class="flex items-center p-4 gap-4">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-emerald-500/20 border border-emerald-500/40">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
                
            </div>
            <div class="flex-1">
                <h3 class="text-emerald-500 font-bold text-sm uppercase tracking-widest">Succès</h3>
                <p class="text-emerald-100/80 font-playfair italic text-sm">
                    {{ session('message') }}
                </p>
            </div>
        </div>
        <div class="h-1 w-full bg-emerald-500/20">
            <div class="h-full bg-emerald-500 w-1/3 animate-pulse"></div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="mb-8 overflow-hidden rounded-xl border border-red-500/30 bg-red-950/20 backdrop-blur-md shadow-lg shadow-red-500/10">
        <div class="flex items-center p-4 gap-4">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-red-500/20 border border-red-500/40">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-red-500 font-bold text-sm uppercase tracking-widest">Attention</h3>
                <p class="text-red-100/80 font-playfair italic text-sm">
                    {{ session('error') }}
                </p>
            </div>
        </div>
        <div class="h-1 w-full bg-red-500/20">
            <div class="h-full bg-red-500 w-1/4 animate-pulse"></div>
        </div>
    </div>
@endif
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-50">
                        <th class="p-6">Client / Email</th>
                        <th class="p-6">Téléphone</th>
                        <th class="p-6">Adresse</th>
                        <th class="p-6">Statut</th>
                        <th class="p-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($clients as $client)
                    <tr class="hover:bg-gray-50/80 transition-all duration-300">
                        <td class="p-6">
                            <p class="text-sm font-bold text-[#0a1118]">{{ $client->name }}</p>
                            <p class="text-[10px] text-gray-400 italic">{{ $client->email }}</p>
                        </td>
                        <td class="p-6 text-xs text-gray-600">{{ $client->telephone }}</td>
                        <td class="p-6 text-xs text-gray-600">{{ $client->adresse }}</td>
                        <td class="p-6">
                            @if($client->is_banne)
                                <span class="px-2 py-1 bg-red-100 text-red-700 text-[9px] font-bold uppercase rounded-full">Banni</span>
                            @else
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-[9px] font-bold uppercase rounded-full">Actif</span>
                            @endif
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('clients.edit', $client->id) }}" class="p-2 text-blue-500 hover:bg-blue-50 rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 11-3.536-3.536l7.072 7.072m0 0l-7.072 7.072m7.072-7.072l-2.828 2.828"></path></svg>
                                </a>
                               <a href="{{ route('clients.sendEmail', $client->id) }}" 
                                    class="p-2 text-[#b89146] hover:bg-[#b89146]/10 rounded-lg transition-all" 
                                    title="Envoyer un email">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </a>
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $clients->links() }}
    </div>
</div>

<style>
    .animate-slide-up { animation: slideUp 0.8s ease-out forwards; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection