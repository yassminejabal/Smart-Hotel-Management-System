<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Modifier Client #{{ $client->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .bg-modifier-client {
            background-image: linear-gradient(rgba(10, 17, 24, 0.93), rgba(10, 17, 24, 0.93)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-modifier-client min-h-screen flex items-center justify-center font-inter p-6">

    <div class="bg-white w-full max-w-2xl p-12 shadow-[0_50px_100px_rgba(0,0,0,0.6)] border-t-[6px] border-[#b89146] relative animate-fade-in">
        
        <header class="text-center mb-10">
            
            <h1 class="font-playfair text-3xl tracking-[4px] text-[#0a1118] uppercase">Modifier le Profil</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mt-2">Mise à jour des informations - Client #{{ $client->id }}</p>
        </header>

        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') 

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 text-left">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $client->nom) }}" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
                </div>

                <div class="space-y-2 text-left">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $client->prenom) }}" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 text-left">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Adresse E-mail</label>
                    <input type="email" name="email" value="{{ old('email', $client->email) }}" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
                </div>

                <div class="space-y-2 text-left">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}"
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
                </div>
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Adresse</label>
                <input type="text" name="adresse" value="{{ old('adresse', $client->adresse) }}"
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Date de Naissance</label>
                <input type="date" name="date_naissance" value="{{ old('date_naissance', $client->date_naissance) }}"
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] transition-all duration-300">
            </div>

            <div class="flex items-center justify-between pt-8 border-t border-gray-100 mt-8">
                {{-- <a href="{{ route('clients.index') }}" class="text-[10px] font-bold text-gray-400 uppercase tracking-widest hover:text-[#0a1118] transition-colors">
                     و الرجوع
                </a> --}}
                
                <button type="submit" 
                    class="py-5 px-12 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[3px] hover:bg-[#b89146] hover:text-[#0a1118] hover:tracking-[5px] transition-all duration-500 shadow-xl">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

</body>
</html>