<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Inscription Luxury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* دمج الخطوط المطلوبة */
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* تخصيص الخلفية مع الصورة المطلوبة والـ Overlay */
        .bg-palace {
            background-image: linear-gradient(rgba(10, 17, 24, 0.85), rgba(10, 17, 24, 0.85)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-palace min-h-screen flex items-center justify-center font-inter p-6">

    <div class="bg-white w-full max-w-md p-10 shadow-[0_50px_100px_rgba(0,0,0,0.6)] border-t-[6px] border-[#b89146] relative animate-fade-in">
        
        <header class="text-center mb-10">
            <h1 class="font-playfair text-4xl tracking-[6px] text-[#0a1118] uppercase">Hotelo</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[4px] uppercase mt-2">Inscription Palace</p>
        </header>

        <form action="{{ route('inscription.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Nom Complet</label>
                <input type="text" name="name" placeholder="Ex: Yassmine Jabal" required
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>


            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Adresse E-mail</label>
                <input type="email" name="email" placeholder="admin@hotelo.com" required
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>

            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300">
            </div>


            <div class="space-y-2 text-left">
                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Rôle Utilisateur</label>
                <div class="relative">
                    <select name="role" required
                        class="w-full p-4 bg-gray-50 border border-gray-100 text-sm focus:outline-none focus:border-[#b89146] focus:bg-white transition-all duration-300 appearance-none cursor-pointer">
                        <option value="" disabled selected>Choisir un rôle...</option>
                        <option value="Receptionniste">Réceptionniste</option>
                        <option value="Client">Client</option>
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-[#b89146]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>

            </div>

            <button type="submit" 
                class="w-full py-5 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[3px] hover:bg-[#b89146] hover:text-[#0a1118] hover:tracking-[5px] transition-all duration-500 shadow-xl mt-4">
                Créer le compte
            </button>
        </form>

        <footer class="mt-8 pt-6 border-t border-gray-100 text-center">
            <a href="{{ route('Login.create') }}" class="text-[10px] font-bold text-gray-500 uppercase tracking-wider hover:text-[#b89146] transition-colors">
                Déjà inscrit ? <span class="text-[#0a1118]">Se connecter</span>
            </a>
        </footer>
    </div>

</body>
</html>