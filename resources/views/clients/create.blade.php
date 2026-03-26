<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        .font-playfair { font-family: 'Playfair Display', serif; }
        .bg-luxury {
            background: linear-gradient(rgba(10, 17, 24, 0.92), rgba(10, 17, 24, 0.92)), 
                        url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop') center/cover fixed;
        }
    </style>
</head>
<body class="bg-luxury font-['Inter'] min-h-screen flex">

    <aside class="w-64 bg-black/40 backdrop-blur-xl border-r border-[#b89146]/20 fixed h-full p-8 flex flex-col">
        <div class="font-playfair text-3xl text-[#b89146] tracking-[4px] mb-12 text-center uppercase">Hotelo</div>
        <nav class="space-y-6 flex-1 text-[10px] font-bold tracking-widest uppercase">
            {{-- <a href="{{ route('clients.index') }}" class="text-[#b89146] block p-3 bg-[#b89146]/10 border-r-4 border-[#b89146]">👥 Gestion Clients</a>
            <a href="{{ route('chambers.index') }}" class="text-gray-400 block p-3 hover:text-[#b89146] transition">🏨 Chambres</a> --}}
            <a href="#" class="text-gray-400 block p-3 hover:text-[#b89146] transition">📅 Réservations</a>
        </nav>
    </aside>

    <main class="ml-64 flex-1 p-12">
        <div class="flex justify-between items-center mb-12">
            <a href="{{ route('clients.create') }}" class="bg-[#b89146] text-[#0a1118] px-6 py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-white transition shadow-xl">Ajouter un Client</a>
            <h1 class="font-playfair text-white text-5xl opacity-80">Annuaire Clients</h1>
        </div>

        <div class="bg-white p-8 border-t-4 border-[#b89146] shadow-2xl">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-gray-400 text-[9px] tracking-[2px] uppercase border-b border-gray-100">
                        <th class="pb-4">Client</th>
                        <th class="pb-4">Contact</th>
                        <th class="pb-4">Localisation</th>
                        <th class="pb-4">Naissance</th>
                        <th class="pb-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($clients as $client)
                    <tr class="border-b border-gray-50 hover:bg-gray-50/80 transition">
                        <td class="py-5">
                            <p class="font-bold text-[#0a1118] uppercase tracking-tighter">
                                {{ $client->nom }} {{ $client->prenom }}
                            </p>
                            <p class="text-[9px] text-gray-400 uppercase font-bold tracking-widest">ID: #C{{ $client->id }}</p>
                        </td>

                        <td class="py-5">
                            <p class="text-gray-600 font-medium lowercase">{{ $client->email }}</p>
                            <p class="text-[11px] text-[#b89146] font-bold">{{ $client->telephone }}</p>
                        </td>

                        <td class="py-5">
                            <p class="text-gray-500 italic text-[12px] max-w-[150px] truncate" title="{{ $client->adresse }}">
                                {{ $client->adresse }}
                            </p>
                        </td>

                        <td class="py-5 font-semibold text-gray-600">
                            {{ $client->date_naissance ? \Carbon\Carbon::parse($client->date_naissance)->format('d/m/Y') : '--/--/----' }}
                        </td>

                        <td class="py-5">
                            <div class="flex justify-center items-center gap-4">
                                <a href="{{ route('clients.history', $client->id) }}" class="text-amber-600 text-[10px] font-bold uppercase hover:underline">📜 History</a>
                                
                                <a href="{{ route('clients.edit', $client->id) }}" class="text-blue-500 text-[10px] font-bold uppercase hover:underline">Modifier</a>
                                
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-[10px] font-bold uppercase hover:underline">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-gray-400 uppercase text-xs tracking-widest italic">
                            Aucune donnée disponible dans l'annuaire.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>