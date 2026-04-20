@extends('layouts.app')
@section('content')
    <main class="ml-64 flex-1 p-12">
        <h1 class="font-playfair text-white text-5xl text-right mb-12 opacity-90">Gestion des Clients</h1>
        <div class="bg-white shadow-2xl border-t-4 border-[#b89146] overflow-hidden">
            <div class="p-8 bg-gradient-to-r from-[#0a1118] to-black text-white">
                <div class="flex justify-between items-center">
                    <h2 class="text-[#b89146] text-[12px] font-bold tracking-[4px] uppercase">Liste Complète</h2>
                    <a href="{{ route('clients.create') }}" class="bg-[#b89146] text-black px-6 py-2 text-xs font-bold uppercase tracking-wider hover:bg-white transition-all">
                        + Nouveau Client
                    </a>
                </div>
            </div>
            <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr class="text-gray-400 text-[10px] tracking-[3px] uppercase border-b">
                            <th class="p-6 font-bold">CLIENT</th>
                            <th class="p-6 font-bold">CONTACT</th>
                            <th class="p-6 font-bold text-center">RÉSERVATIONS</th>
                            <th class="p-6 font-bold text-right">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($clients as $client)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#b89146] to-orange-500 flex items-center justify-center text-white font-bold text-sm uppercase shadow-lg">
                                        {{ substr($client->prenom, 0, 1) }}{{ substr($client->nom, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-lg text-gray-900">{{ $client->prenom }} {{ $client->nom }}</p>
                                        <p class="text-sm text-gray-500">{{ $client->adresse ?? 'Non renseigné' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-6">
                                <div class="space-y-1">
                                    <p class="font-semibold text-gray-900">{{ $client->email }}</p>
                                    <p class="text-sm text-blue-600 font-mono">{{ $client->telephone }}</p>
                                </div>
                            </td>
                            <td class="p-6 text-center">
                                <span class="px-4 py-2 bg-blue-50 text-blue-700 text-xs font-bold rounded-full">
                                    {{ $client->reservations->count() }}
                                </span>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex gap-2 justify-end">
                                    <a href="{{ route('client.historique', $client->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('clients.edit', $client->id) }}" class="p-2 text-[#b89146] hover:bg-[#b89146]/10 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2.5 2.5 0 11-3.536-3.536l7.072 7.072m0 0l-7.072 7.072m7.072-7.072l-2.828 2.828"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer {{ $client->prenom }} {{ $client->nom }} ?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>

