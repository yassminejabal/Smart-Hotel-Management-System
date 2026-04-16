<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Inscription Luxury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .bg-palace {
            background-image: linear-gradient(rgba(10, 17, 24, 0.9), rgba(10, 17, 24, 0.9)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-palace min-h-screen flex items-center justify-center font-inter p-6">

    <div class="w-full max-w-md bg-white/5 border border-white/10 p-10 backdrop-blur-xl shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-[4px] bg-[#b89146]"></div>
        
        <header class="text-center mb-10">
            <h1 class="font-playfair text-5xl tracking-[8px] text-white uppercase">Hotelo</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[5px] uppercase mt-3 italic">Inscription Palace</p>
        </header>

      <form action="{{ route('inscription.store') }}" method="POST" class="space-y-5">
    @csrf
    
    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Nom Complet</label>
        <input type="text" name="name" placeholder="Ex: Yassmine Jabal" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse E-mail</label>
        <input type="email" name="email" placeholder="admin@hotelo.com" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Téléphone</label>
        <input type="tel" name="telephone" placeholder="Ex: +212 600 000 000" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Adresse</label>
        <input type="text" name="adresse" placeholder="Votre adresse" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Date de naissance</label>
        <input type="date" name="date_naissance" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Mot de passe</label>
        <input type="password" name="password" placeholder="••••••••" required
            class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all duration-300 placeholder:text-gray-600">
    </div>

    <div class="space-y-2">
        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">Rôle Utilisateur</label>
        <div class="relative">
            <select name="role" required
                class="w-full p-4 bg-white/5 border border-white/10 text-sm text-white focus:outline-none focus:border-[#b89146] transition-all appearance-none cursor-pointer">
                <option value="" disabled selected class="bg-[#0a1118]">Choisir un rôle...</option>
                <option value="Client" class="bg-[#0a1118]">Client</option>
            </select>
            <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-[#b89146]">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
            </div>
        </div>
    </div>

    <button type="submit" 
        class="w-full py-5 bg-[#b89146] text-[#0a1118] text-[11px] font-bold uppercase tracking-[4px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-2xl mt-6">
        Créer le compte
    </button>
</form>

        <footer class="mt-10 pt-6 border-t border-white/5 text-center">
            <a href="{{ route('Login.create') }}" class="text-[10px] font-bold text-gray-500 uppercase tracking-widest hover:text-[#b89146] transition-colors">
                Déjà inscrit ? <span class="text-gray-300">Se connecter</span>
            </a>
        </footer>
    </div>

</body>
</html>