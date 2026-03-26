<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Registre des Réservations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        .font-playfair { font-family: 'Playfair Display', serif; }
        .bg-luxury-palace {
            background: linear-gradient(rgba(10, 17, 24, 0.95), rgba(10, 17, 24, 0.95)), 
                        url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop') center/cover fixed;
        }
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #b89146; border-radius: 10px; }
    </style>
</head>
<body class="bg-luxury-palace font-['Inter'] min-h-screen flex">

    <aside class="w-64 bg-black/40 backdrop-blur-xl border-r border-[#b89146]/20 fixed h-full p-8 flex flex-col z-50">
        <div class="font-playfair text-3xl text-[#b89146] tracking-[4px] mb-12 text-center uppercase">Hotelo</div>
        <nav class="space-y-6 flex-1 text-[10px] font-bold tracking-widest uppercase">
            <a href="{{route('chambers.index')}}" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">📊 Tableau de Bord</a>
            <a href="{{ route('reservations.index') }}" class="text-gray-400 block p-3 hover:text-[#b89146] transition">👥 Clients</a>

        </nav>
    </aside>

    <main class="ml-64 flex-1 p-12">
        <header class="flex justify-between items-end mb-12">
            <div>
                <p class="text-[#b89146] text-[10px] font-bold uppercase tracking-[4px] mb-2">Gestion hôtelière</p>
                <h1 class="font-playfair text-white text-5xl opacity-90">Réservations</h1>
            </div>
            <a href="{{ route('reservations.create') }}" class="bg-[#b89146] text-[#0a1118] px-8 py-4 text-[10px] font-bold uppercase tracking-[3px] hover:bg-white transition shadow-2xl">
                Nouvelle Réservation
            </a>
        </header>

        <div class="bg-white p-8 border-t-4 border-[#b89146] shadow-2xl overflow-hidden">
            <div class="max-h-[600px] overflow-y-auto pr-2 custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead class="sticky top-0 bg-white z-10 border-b-2 border-gray-50">
                        <tr class="text-gray-400 text-[9px] tracking-[2px] uppercase">
                            <th class="pb-4">Client & Contact</th>
                            <th class="pb-4">Séjour (Dates)</th>
                            <th class="pb-4">Chambre</th>
                            <th class="pb-4">Montant Total</th>
                            <th class="pb-4">Statut</th>
                            <th class="pb-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        {{-- @foreach($reservations as $reservation) --}}
                        <tr class="border-b border-gray-50 hover:bg-gray-50/80 transition">
                            <td class="py-5">
                                {{-- <p class="font-bold text-[#0a1118] uppercase tracking-tighter">{{ $reservation->client->nom }} {{ $reservation->client->prenom }}</p> --}}
                                {{-- <p class="text-[10px] text-[#b89146] font-bold">{{ $reservation->client->telephone }}</p> --}}
                            </td>

                            <td class="py-5">
                                <div class="flex flex-col">
                                    {{-- <span class="text-gray-600 font-semibold">Du: {{ date('d/m/Y', strtotime($reservation->date_debut)) }}</span> --}}
                                    {{-- <span class="text-gray-400 text-[11px]">Au: {{ date('d/m/Y', strtotime($reservation->date_fin)) }}</span> --}}
                                </div>
                            </td>

                            <td class="py-5">
                                {{-- <span class="bg-gray-100 px-3 py-1 rounded text-[#0a1118] font-bold text-[11px]">CH #{{ $reservation->chambre->num         ber_Chambre }}</span> --}}
                            </td>

                            <td class="py-5">
                                {{-- <p class="font-bold text-[#0a1118]">{{ number_format($reservation->prix_total, 2) }} DH</p> --}}
                            </td>

                            <td class="py-5">
                                {{-- @php
                                    $statusClasses = [
                                        'Confirmé' => 'bg-green-100 text-green-600',
                                        'En attente' => 'bg-amber-100 text-amber-600',
                                        'Annulé' => 'bg-red-100 text-red-600'
                                    ];
                                @endphp --}}
                                {{-- <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase {{ $statusClasses[$reservation->statut] ?? 'bg-gray-100 text-gray-600' }}"> --}}
                                    {{-- {{ $reservation->statut }} --}}
                                </span>
                            </td>

                            <td class="py-5 text-center">
                                <div class="flex justify-center gap-4">
                                    {{-- <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-blue-500 hover:text-blue-700 transition"> --}}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                    </a>
                                    {{-- <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Supprimer cette réservation?')"> --}}
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>