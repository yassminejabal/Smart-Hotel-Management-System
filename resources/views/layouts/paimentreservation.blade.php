<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Facture Premium Luxe</title>
    <script src="https://cdn.tailwindcss.com"></script>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@400;500;700;900&display=swap');
    
    body { font-family: 'Inter', sans-serif; overflow-x: hidden; scroll-behavior: smooth; }
    .font-playfair { font-family: 'Playfair Display', serif; }

    /* 1. الخلفية المتحركة الملكية - Plus fluide */
    .bg-luxury-palace {
        background: linear-gradient(rgba(7, 11, 15, 0.92), rgba(7, 11, 15, 0.92)), 
                    url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop');
        background-size: cover; 
        background-position: center; 
        background-attachment: fixed;
        animation: breatheBackground 40s infinite alternate linear;
    }

    @keyframes breatheBackground {
        0% { background-position: center; transform: scale(1); }
        100% { background-position: top center; transform: scale(1.08); }
    }

    /* 2. حركات الدخول السينمائي - Plus douce */
    @keyframes cinematicFadeIn {
        0% { opacity: 0; filter: blur(20px); transform: translateY(60px); }
        100% { opacity: 1; filter: blur(0); transform: translateY(0); }
    }
    .animate-card { animation: cinematicFadeIn 1.8s cubic-bezier(0.19, 1, 0.22, 1) forwards; }

    /* 3. سحر المربع المالي - Gold Gradient Animation */
    @keyframes border-glow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .payment-card-luxe {
        position: relative;
        background: #fff;
        z-index: 1;
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        border: 1px solid rgba(184, 145, 70, 0.1);
    }

    .payment-card-luxe:hover {
        transform: translateY(-5px);
        shadow: 0 40px 80px rgba(184, 145, 70, 0.15);
    }

    /* Animated Gradient Border */
    .payment-card-luxe::before {
        content: '';
        position: absolute;
        inset: -1px;
        background: linear-gradient(90deg, #b89146, #fef3c7, #b89146, #0a1118);
        background-size: 300% 300%;
        z-index: -1;
        animation: border-glow 8s ease infinite;
    }

    /* 4. Effet de brillance (Shine) amélioré */
    .shine-effect {
        position: absolute;
        top: 0; left: -150%;
        width: 100%; height: 100%;
        background: linear-gradient(to right, transparent, rgba(184, 145, 70, 0.1), transparent);
        transform: skewX(-30deg);
        transition: 0.8s;
    }
    .payment-card-luxe:hover .shine-effect { left: 150%; }

    /* 5. Button Shimmer Auto-Luxe */
    .btn-shimmer-auto {
        position: relative;
        overflow: hidden;
        background: #0a1118;
        transition: all 0.4s ease;
    }
    
    .btn-shimmer-auto::after {
        content: "";
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: linear-gradient(45deg, transparent, rgba(184, 145, 70, 0.2), transparent);
        transform: rotate(45deg);
        animation: continuousShimmer 4s infinite linear;
    }

    @keyframes continuousShimmer {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    /* Aside Menu Styling */
    aside {
        backdrop-filter: blur(20px);
        background: rgba(10, 17, 24, 0.98) !important;
    }

    /* Print Optimization */
    @media print {
        .no-print { display: none !important; }
        .bg-luxury-palace { background: white !important; }
        .animate-card { animation: none !important; box-shadow: none !important; border: 1px solid #eee !important; }
        body { padding: 0; margin: 0; }
    }
</style>
</head>
<body class="bg-luxury-palace min-h-screen flex items-center justify-center p-6">

    <input type="checkbox" id="menu-toggle" class="peer hidden">
    <label for="menu-toggle" class="peer-checked:opacity-100 peer-checked:pointer-events-auto pointer-events-none opacity-0 fixed inset-0 bg-black/70 backdrop-blur-md z-40 transition-opacity duration-500 no-print cursor-pointer"></label>

    <aside class="fixed left-0 top-0 h-full w-80 bg-[#0a1118] border-r border-[#b89146]/30 z-50 -translate-x-full peer-checked:translate-x-0 transition-transform duration-700 cubic-bezier(0.16, 1, 0.3, 1) shadow-[30px_0_100px_rgba(0,0,0,0.9)] no-print flex flex-col p-12">
        <div class="font-playfair text-4xl text-[#b89146] tracking-[8px] mb-20 uppercase font-black italic">Hotelo</div>
        
       <nav class="space-y-12 flex-1">
    <div class="space-y-6">
        <p class="text-[10px] text-gray-500 uppercase tracking-[5px] font-bold border-b border-white/5 pb-2">Menu Principal</p>
        
        <a href="{{ route('client.dashboard',$reservation->id) }}" class="flex items-center gap-4 text-white text-[12px] font-bold uppercase tracking-[3px] hover:text-[#b89146] transition-all group">
            <span class="w-8 h-[1px] bg-[#b89146] group-hover:w-14 transition-all"></span> Dashboard
        </a>
    </div>
</nav>


@yield('contant')

</body>
</html>