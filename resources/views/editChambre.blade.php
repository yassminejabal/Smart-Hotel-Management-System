<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Modifier la Chambre</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* الخلفية الموحدة للمشروع */
        .bg-modifier {
            background-image: linear-gradient(rgba(10, 17, 24, 0.9), rgba(10, 17, 24, 0.9)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-modifier min-h-screen flex items-center justify-center font-inter p-6">

    <div class="bg-white w-full max-w-2xl p-12 shadow-[0_50px_100px_rgba(0,0,0,0.6)] border-t-[6px] border-[#b89146] relative animate-fade-in">
        
        <header class="text-center mb-10">
            <h1 class="font-playfair text-3xl tracking-[4px] text-[#0a1118] uppercase">Modifier la Chambre</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mt-2">Mise à jour des informations - Chambre #{{ $chambre->number_Chambre }}</p>
        </header>

        <form action="{{ route('chambers.update', $chambre->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">N° de Chambre</label>
                    <input type="number" name="number_Chambre" value="{{ $chambre->number_Chambre }}" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Type de Chambre</label>
                    <select name="type" class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] cursor-pointer appearance-none">
                        <option value="Simple" {{ $chambre->type == 'Simple' ? 'selected' : '' }}>Simple</option>
                        <option value="Double" {{ $chambre->type == 'Double' ? 'selected' : '' }}>Double</option>
                        <option value="Suite" {{ $chambre->type == 'Suite' ? 'selected' : '' }}>Suite</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Statut</label>
                    <select name="statut" class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] cursor-pointer appearance-none">
                        <option value="Disponible" {{ $chambre->statut == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                        <option value="Occupee" {{ $chambre->statut == 'Occupee' ? 'selected' : '' }}>Occupée</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prix par Nuit (DH)</label>
                    <input type="number" name="prix_base" value="{{ $chambre->prix_base }}" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                </div>
            </div>

            <div class="flex items-center justify-between pt-8 border-t border-gray-100">
                <a href="{{ route('chambers.index') }}" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-[#0a1118] transition-colors">
                    ← Annuler
                </a>
                
                <button type="submit" 
                    class="py-5 px-12 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[3px] hover:bg-[#b89146] hover:text-[#0a1118] hover:tracking-[5px] transition-all duration-500 shadow-xl">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

</body>
</html>