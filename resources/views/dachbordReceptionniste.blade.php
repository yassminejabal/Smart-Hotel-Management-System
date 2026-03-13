<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Gestion Palace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* الخلفية الموحدة للمشروع */
        .bg-dashboard {
            background-image: linear-gradient(rgba(10, 17, 24, 0.9), rgba(10, 17, 24, 0.9)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* تخصيص السكرول بار الذهبي */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #b89146; border-radius: 10px; }
    </style>
</head>
<body class="bg-dashboard font-inter min-h-screen flex">

    <aside class="w-64 bg-[#0a1118]/80 backdrop-blur-md border-r border-[#b89146]/30 h-screen fixed flex flex-col p-10">
        <div class="font-playfair text-3xl text-[#b89146] tracking-[5px] text-center mb-12 uppercase">Hotelo</div>
        
        <nav class="flex-1 space-y-4">
            <a href="#" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">📊 Tableau de Bord</a>
            <a href="#" class="block text-[#b89146] border-r-4 border-[#b89146] bg-[#b89146]/10 p-3 text-xs font-bold uppercase tracking-widest transition-all">🏨 Gestion Chambres</a>
            <a href="#" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">📅 Réservations</a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 text-red-400 text-[10px] font-bold uppercase tracking-[2px] border border-red-400/20 p-4 hover:bg-red-400/10 transition-all">
                <span>▮</span> DÉCONNEXION
            </button>
        </form>
    </aside>

    <main class="ml-64 flex-1 p-12">
        <h1 class="font-playfair text-white text-5xl text-right mb-12 opacity-90">Gestion des Chambres</h1>

        <section class="bg-white p-8 border-t-4 border-[#b89146] shadow-2xl mb-10">
            <h2 class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mb-8 text-right">Ajouter une Chambre</h2>
            
            <form action="{{route('Chambre.store')}}" method="POST" class="grid grid-cols-4 gap-6 items-end">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">N° Chambre</label>
                    <input name="number_Chambre" type="number" placeholder="101" required
                        class="w-full p-3 bg-gray-50 border border-gray-100 focus:outline-none focus:border-[#b89146] text-sm">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Type</label>
                    <select name="type" class="w-full p-3 bg-gray-50 border border-gray-100 focus:outline-none focus:border-[#b89146] text-sm cursor-pointer">
                        <option value="Simple">Simple</option>
                        <option value="Double">Double</option>
                        <option value="Suite">Suite</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Statut</label>
                    <select name="statut" class="w-full p-3 bg-gray-50 border border-gray-100 focus:outline-none focus:border-[#b89146] text-sm cursor-pointer">
                        <option value="Disponible">Disponible</option>
                        <option value="Occupee">Occupee</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prix (DH)</label>
                    <input name="prix_base" type="number" placeholder="800" required
                        class="w-full p-3 bg-gray-50 border border-gray-100 focus:outline-none focus:border-[#b89146] text-sm">
                </div>
                <div class="col-span-4 text-right mt-4">
                    <button type="submit" class="bg-[#0a1118] text-white px-8 py-3 text-[10px] font-bold uppercase tracking-widest hover:bg-[#b89146] hover:text-[#0a1118] transition-all">
                        Enregistrer
                    </button>
                </div>
            </form>
        </section>

        <section class="bg-white p-8 border-t-4 border-[#b89146] shadow-2xl">
            <h2 class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mb-8 text-right">Liste des Chambres</h2>
            
            <div class="table-container max-h-[400px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr class="text-gray-400 text-[10px] tracking-widest border-bottom-2 border-[#b89146]">
                            <th class="py-4">NUMÉRO</th>
                            <th class="py-4">TYPE</th>
                            <th class="py-4">PRIX</th>
                            <th class="py-4">STATUT</th>
                            <th class="py-4 text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                 @foreach($data as $chambre)
<tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
    <td class="py-5 font-bold">#{{ $chambre->number_Chambre }}</td>
    <td class="py-5 text-gray-600">{{ $chambre->type }}</td>
    <td class="py-5 text-gray-600 font-semibold">{{ $chambre->prix_base }} DH</td>
    <td class="py-5">
        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $chambre->statut == 'Disponible' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
            {{ $chambre->statut }}
        </span>
    </td>
    
    <td class="py-5 text-center flex justify-center items-center gap-4">
        
        {{-- <form action="{{ route('chambers.update', $chambre->id) }}" method="POST" class="inline"> --}}
            {{-- @csrf   --}}
            {{-- @method('PUT') --}}
            <a href="{{route('chambers.edit',$chambre->id)}}" class="text-blue-500 font-bold text-[11px] uppercase tracking-wider hover:text-blue-700 transition-colors">
                Modifier
            </a>    
        {{-- </form> --}}

        <span class="text-gray-200">|</span>

        <form action="{{ route('chambers.destroy', $chambre->id) }}" method="POST" class="inline" onsubmit=" return confirm('supprimer cette chambre ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 font-bold text-[11px] uppercase tracking-wider hover:text-red-700 transition-colors">
                Supprimer
            </button>
        </form>
        
    </td>
</tr>
@endforeach
                </table>
            </div>
        </section>
    </main>

</body>
</html>