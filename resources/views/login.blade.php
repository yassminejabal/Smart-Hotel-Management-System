<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Connexion Exclusive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .bg-luxury {
            background-image: linear-gradient(rgba(10, 17, 24, 0.9), rgba(10, 17, 24, 0.9)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-luxury min-h-screen flex items-center justify-center font-inter p-6">
 

    <div class="w-full max-w-md bg-white/5 border border-white/10 p-10 backdrop-blur-xl shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-[4px] bg-[#b89146]"></div>
        
        <header class="text-center mb-12">
            <h1 class="font-playfair text-5xl tracking-[8px] text-white uppercase">Hotelo</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[5px] uppercase mt-3 italic">Gestion Palace</p>
            <div class="w-12 h-[1px] bg-[#b89146]/3login.stor0 mx-auto mt-6"></div>
        </header>
         @if(session('is bann'))
    <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded mb-4 text-sm text-center">
        {{ session('is bann') }}
    </div>
@endif

        <form action="{{ route('Login.store') }}" method="POST" class="space-y-8" autocomplete="off">
            @csrf
            
            <div class="space-y-3">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Identifiant E-mail</label>
                <input type="email" name="email" placeholder="admin@hotelo.com" required
                    class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
            </div>

            <div class="space-y-3">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
            </div>

            <button type="submit" 
                class="w-full py-5 bg-[#b89146] text-[#0a1118] text-[11px] font-bold uppercase tracking-[4px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-2xl">
                S'identifier au Système
            </button>
        </form>

        <footer class="mt-12 pt-8 border-t border-white/5">
            <p class="text-[9px] text-gray-500 uppercase tracking-widest text-center mb-6 italic">Accès restreint au personnel autorisé</p>
            
            <div class="flex justify-between items-center">
                <a href="{{ route('inscription.create') }}" class="text-[10px] font-bold text-gray-300 uppercase tracking-widest hover:text-[#b89146] transition-colors">
                    Créer un compte
                </a>
                <a href="#" class="text-[10px] font-bold text-gray-500 uppercase tracking-widest hover:text-[#b89146] transition-colors">
                    Aide ?
                </a>
            </div>
        </footer>
    </div>

</body>
</html>