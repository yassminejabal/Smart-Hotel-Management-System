<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Nouveau Membre Palace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* الخلفية الموحدة للمشروع مع صورة البالاس */
        .bg-create-client {
            background-image: linear-gradient(rgba(10, 17, 24, 0.93), rgba(10, 17, 24, 0.93)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; 
            background-position: center; 
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-create-client min-h-     flex items-center justify-center font-inter p-6">

    <div class="bg-white w-full max-w-2xl p-12 shadow-[0_50px_100px_rgba(0,0,0,0.5)] border-t-[6px] border-[#b89146] relative animate-fade-in">
        
        <header class="text-center mb-12">
            <h1 class="font-playfair text-4xl tracking-[4px] text-[#0a1118] uppercase">Nouveau Client</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mt-3">Enregistrement d'un nouveau membre au Palace</p>
        </header>

        <form action="{{ route('clients.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Ex: Jabal" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                {{-- <span class="text-red-500 text-[10px] font-bold">{{ $message }}</span> --}}
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Ex: Yassmine" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                    {{-- @error('prenom') <span class="text-red-500 text-[10px] font-bold">{{ $message }}</span> @enderror --}}
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Adresse E-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="y.jabal@hotelo.com" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                    {{-- @error('email') <span class="text-red-500 text-[10px] font-bold">{{ $message }}</span> @enderror --}}
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="+212 6..."
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
                </div>
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Adresse de Résidence</label>
                <input type="text" name="adresse" value="{{ old('adresse') }}" placeholder="Rue de la Liberté, Marrakech"
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Date de Naissance</label>
                <input type="date" name="date_naissance" value="{{ old('date_naissance') }}"
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300 cursor-pointer text-gray-400">
            </div>

            <div class="flex items-center justify-between pt-10 border-t border-gray-100 mt-10">
                <a href="#" class="text-[10px] font-bold text-gray-400 uppercase tracking-[2px] hover:text-[#0a1118] transition-colors">
                    ← Retour à la liste
                </a>
                <button type="submit"       
                    class="py-5 px-12 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[4px] hover:bg-[#b89146] hover:text-[#0a1118] transition-all duration-500 shadow-2xl">
                    Créer le Profil Client
                </button>
            </div>
        </form>
    </div>

</body>
</html>





