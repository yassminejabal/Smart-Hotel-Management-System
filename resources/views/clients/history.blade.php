<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Historique de {{ $client->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        /* الخلفية الموحدة للمشروع مع الصورة و الـ Overlay */
        .bg-history-client {
            background-image: linear-gradient(rgba(10, 17, 24, 0.95), rgba(10, 17, 24, 0.95)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* تخصيص السكرول بار الذهبي الرفيع */
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #b89146; border-radius: 10px; }
    </style>
</head>
<body class="bg-history-client min-h-screen flex font-inter">

    <aside class="w-64 bg-[#0a1118]/90 backdrop-blur-sm border-r border-[#b89146]/20 h-screen fixed flex flex-col p-10">
        <div class="font-playfair text-3xl text-[#b89146] tracking-[5px] text-center mb-12 uppercase">Hotelo</div>
        
        <nav class="flex-1 space-y-4 text-left">
            <a href="#" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">📊 Tableau de Bord</a>
            <a href="{{ route('clients.index') }}" class="block text-[#b89146] border-l-4 border-[#b89146] pl-3 text-xs font-bold uppercase tracking-widest transition-all">👥 Gestion Clients</a>
            <a href="#" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">🏨 Chambres</a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="mt-auto pt-6 border-t border-white/10">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-3 text-red-400 text-[10px] font-bold uppercase tracking-[2px] border border-red-400/20 p-4 hover:bg-red-400/10 transition-all">
                <span>▮</span> DÉCONNEXION
            </button>
        </form>
    </aside>

    <main class="ml-64 flex-1 p-12">
        <header class="flex justify-between items-center mb-12">
            <a href="{{ route('clients.index') }}" class="bg-[#0a1118] text-white px-8 py-4 text-[10px] font-bold uppercase tracking-widest hover:bg-[#b89146] hover:text-[#0a1118] transition-all shadow-lg">
                ← Retour à la liste
            </a>
            <h1 class="font-playfair text-white text-5xl text-right opacity-90 italic">Historique de {{ $client->name }}</h1>
        </header>

        <section class="bg-white p-10 border-t-4 border-[#b89146] shadow-2xl animate-fade-in">
            <h2 class="text-[#b89146] text-[10px] font-bold tracking-[3px] uppercase mb-10 text-right">Liste des Réservations passées</h2>
            
            <div class="space-y-6 max-h-[500px] overflow-y-auto pr-4 custom-scrollbar">
                @forelse($reservations as $res)
                <div class="flex items-center justify-between border-b border-gray-50 pb-5 hover:bg-gray-50 transition-colors p-4 rounded-sm">
                    <div class="flex items-center gap-8">
                        <span class="text-[10px] font-bold text-[#b89146] border border-[#b89146] px-4 py-2 bg-[#b89146]/5 tracking-widest">RÉSA #{{ $res->id }}</span>
                        
                        <div class="text-left">
                            <p class="text-sm font-bold text-[#0a1118] uppercase tracking-tighter">Chambre {{ $res->chambre->number_Chambre }}</p>
                            <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-widest mt-1">Du {{ $res->date_debut }} au {{ $res->date_fin }}</p>
                        </div>
                    </div>
                    
                    <div class="text-right space-y-2">
                        <p class="text-sm font-bold text-[#b89146]">{{ $res->total_prix }} DH</p>
                        <span class="text-[9px] font-bold uppercase text-green-500 bg-green-50 px-3 py-1 rounded-full">Confirmé</span>
                    </div>
                </div>
                @empty
                <div class="text-center py-16 border-2 border-dashed border-gray-100">
                    <p class="text-gray-400 uppercase text-xs tracking-widest">Aucune réservation trouvée لم يتم العثور على حجوزات لهذا العميل.</p>
                </div>
                @endforelse
            </div>
        </section>
    </main>

</body>
</html>