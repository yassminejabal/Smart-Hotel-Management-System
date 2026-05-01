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

                <div class="flex gap-6 text-[10px] font-bold uppercase tracking-[3px]">
                    <a href="{{ route('Login.create') }}" class="hover:text-[#b89146] transition duration-500 py-2">Connexion</a>
                    <a href="{{ route('inscription.create') }}" class="bg-[#b89146] text-[#0a1118] px-6 py-2 hover:bg-white transition-all duration-500 shadow-lg shadow-[#b89146]/20">Inscription</a>
                </div>
        </div>
    </nav>
    @yield('content')
        <x-footer />

</body>
</html>