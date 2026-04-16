<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Pure Luxury & Member Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;600&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes scaleIn {
            from { transform: scale(1.1); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .animate-hero-text { animation: fadeInUp 1.2s cubic-bezier(0.2, 1, 0.2, 1) forwards; }
        .animate-hero-bg { animation: scaleIn 2s ease-out forwards; }

        .delay-1 { animation-delay: 0.3s; opacity: 0; animation-fill-mode: forwards; }
        .delay-2 { animation-delay: 0.6s; opacity: 0; animation-fill-mode: forwards; }
        
        .glass-nav {
            background: rgba(10, 17, 24, 0.4);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body class="bg-[#0a1118] text-white font-inter overflow-x-hidden text-left">

    <nav class="fixed w-full z-50 p-6 flex flex-wrap justify-between items-center glass-nav animate-hero-text">
        <div class="text-2xl font-playfair tracking-[8px] font-black uppercase text-white">Hotelo</div>
        
        <div class="hidden lg:flex gap-12 text-[10px] font-bold uppercase tracking-[4px]">
          
        </div>
        
        <div class="flex items-center gap-6">
                <div class="flex gap-6 items-center text-[10px] font-bold uppercase tracking-[3px]">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-white/10 px-4 py-2 hover:bg-red-500/20 hover:text-red-500 transition-all duration-500">Déconnexion</button>
                    </form>
                </div>

                <div class="flex gap-6 text-[10px] font-bold uppercase tracking-[3px]">
                    <a href="{{ route('Login.create') }}" class="hover:text-[#b89146] transition duration-500 py-2">Connexion</a>
                    <a href="{{ route('inscription.create') }}" class="bg-[#b89146] text-[#0a1118] px-6 py-2 hover:bg-white transition-all duration-500 shadow-lg shadow-[#b89146]/20">Inscription</a>
                </div>
        </div>
    </nav>

    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0 animate-hero-bg">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a1118]/60 via-transparent to-[#0a1118] z-10"></div>
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070" 
                 class="w-full h-full object-cover scale-105" alt="Luxe">
        </div>

        <div class="relative z-20 text-center px-4 max-w-5xl">
            <span class="inline-block mb-6 text-[#b89146] text-[10px] font-bold tracking-[15px] uppercase animate-hero-text delay-1">Bienvenue au Palace</span>
            <h1 class="font-playfair text-6xl md:text-[110px] leading-[0.9] mb-12 animate-hero-text delay-2">
                L'Art de Vivre <br> <span class="italic font-light text-[#b89146]">Absolu</span>
            </h1>
            
            <div class="animate-hero-text delay-2 mt-8">
                    <p class="text-gray-400 text-[10px] uppercase tracking-[5px] mb-10 max-w-md mx-auto leading-loose">Accédez à un univers de privilèges réservé à nos membres exclusifs.</p>
                    <div class="flex flex-col md:flex-row gap-6 justify-center items-center">
                        <a href="{{ route('inscription.create') }}" class="px-12 py-5 bg-[#b89146] text-[#0a1118] text-[10px] font-bold uppercase tracking-[4px] hover:bg-white transition-all duration-500 shadow-2xl">
                            Devenir Membre
                        </a>
                    </div>
               
            </div>
        </div>
        
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 animate-bounce opacity-30">
            <div class="w-[1px] h-12 bg-white"></div>
        </div>
    </section>

    <footer class="py-12 text-center border-t border-white/5 bg-[#0a1118]">
        <div class="text-[9px] font-bold text-gray-600 uppercase tracking-[6px]">Hotelo Palace Private Collection © 2026</div>
    </footer>

</body>
</html>