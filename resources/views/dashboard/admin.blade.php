@extends('layouts.app')
@section('content')

    <div class="w-full p-12 animate-slide-up">
        
        <header class="flex justify-between items-end mb-16 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Administration Palace</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Tableau <br>de Bord</h1>
            </div>
            <div class="text-right hidden md:block">
                <div class="w-16 h-[2px] bg-[#b89146] ml-auto mb-4"></div>
                <p class="text-gray-400 text-[10px] uppercase tracking-[4px]">Rapports en Temps Réel</p>
            </div>
        </header>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-[#b89146]/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#b89146]"></div>
                <h2 class="text-[#b89146] text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Total Réservations</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $totalReservations }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
            
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-green-500/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-green-500"></div>
                <h2 class="text-green-500 text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Chambres Disponibles</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $disponibles }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
            
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-red-500/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                <h2 class="text-red-500 text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Chambres Occupées</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $occupees }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
        </div>

        <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[6px] bg-[#b89146]"></div>
            
            <div class="p-8 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-playfair text-2xl text-[#0a1118] tracking-wide">
                    Liste des Clients
                </h2>
                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-[3px]">Hébergement Palace</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-50">
                            <th class="p-6">ID</th>
                            <th class="p-6">Identité</th>
                            <th class="p-6">Contact</th>
                            <th class="p-6">Localisation</th>
                            <th class="p-6">Naissance</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-gray-900">
                        @foreach ($clients as $client)
                            <tr class="hover:bg-gray-50/50 transition duration-300">
                                <td class="p-6">
                                    <span class="text-[#b89146] font-bold text-xs italic">#{{ $client->id }}</span>
                                </td>
                                <td class="p-6">
                                    <p class="text-sm font-bold text-[#0a1118]">{{ $client->nom }} {{ $client->prenom }}</p>
                                </td>
                                <td class="p-6">
                                    <p class="text-xs text-[#0a1118]">{{ $client->email }}</p>
                                    <p class="text-[10px] text-gray-400 mt-1">{{ $client->telephone }}</p>
                                </td>
                                <td class="p-6">
                                    <p class="text-xs text-gray-600 italic">{{ $client->adresse }}</p>
                                </td>
                                <td class="p-6">
                                    <span class="text-[10px] font-medium text-gray-400">{{ $client->date_naissance }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .animate-slide-up {
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Scrollbar for the table if needed */
        .overflow-x-auto::-webkit-scrollbar {
            height: 4px;
        }
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #b89146;
        }
    </style>

@endsection