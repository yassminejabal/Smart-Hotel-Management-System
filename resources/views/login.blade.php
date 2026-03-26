<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Connexion Exclusive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* دمج الخطوط المطلوبة */
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* الخلفية الموحدة مع الصورة والـ Overlay */
        .bg-luxury {
            background-image: linear-gradient(rgba(10, 17, 24, 0.85), rgba(10, 17, 24, 0.85)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-luxury min-h-screen flex items-center justify-center font-inter p-6">

    <div class="bg-white w-full max-w-md p-10 shadow-[0_50px_100px_rgba(0,0,0,0.6)] border-t-[6px] border-[#b89146] relative">
        
        <header class="text-center mb-10">
            <h1 class="font-playfair text-4xl tracking-[6px] text-[#0a1118] uppercase">Hotelo</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[4px] uppercase mt-2">Gestion Palace</p>
        </header>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Adresse E-mail</label>
                <input value="{{ old('email') }}" type="email" name="email" placeholder="admin@hotelo.com" required
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>

            <button type="submit" 
                class="w-full py-5 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[3px] hover:bg-[#b89146] hover:text-[#0a1118] hover:tracking-[5px] transition-all duration-500 shadow-xl">
                S'identifier
            </button>
        </form>

        <footer class="mt-8 pt-6 border-t border-gray-100">
            <p class="text-[10px] text-gray-400 uppercase tracking-widest text-center mb-4">Accès réservé au personnel</p>
            <div class="flex justify-between items-center">
                <a href="{{ route('inscription.create') }}" class="text-[10px] font-bold text-[#0a1118] uppercase tracking-wider hover:text-[#b89146] transition-colors">
                    Créer un compte
                </a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-[10px] font-bold text-gray-400 uppercase tracking-wider hover:text-[#b89146] transition-colors">
                    Mot de passe oublié ?
                </a>
            </div>
        </footer>
    </div>

</body>
</html>