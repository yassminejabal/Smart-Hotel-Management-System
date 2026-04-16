<aside class="w-72 border-r border-[#b89146]/20 p-10 flex flex-col fixed h-full bg-black/40 backdrop-blur-2xl z-50">
    <div class="font-playfair text-4xl text-[#b89146] tracking-[8px] mb-16 uppercase font-black italic">
        Hotelo
    </div>

    <nav class="flex-1 space-y-4 text-[10px] font-bold tracking-[4px] uppercase">
        @php 
        $userRole = Auth::user()->role 
        @endphp
        
        @if($userRole === 'Admin')
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 text-[#b89146] border-b border-[#b89146]/20 pb-2 transition-all italic">
                📊 Dashboard Admin
            </a>
            
        @elseif($userRole === 'Client')
            <a href="{{ route('client.dashboard') }}" class="flex items-center gap-3 text-[#b89146] border-b border-[#b89146]/20 pb-2 transition-all italic">
                📊 Dashboard Client
            </a>
            <div class="pt-8 border-t border-white/5">
                <p class="text-[#b89146] mb-4 text-[9px] italic tracking-[2px]">Espace Client</p>
                <p class="text-white text-xl font-playfair tracking-tight uppercase">
                </p>
            </div>
        @elseif($userRole === 'Receptionniste')
            <a href="{{ route('reservations.index') }}" class="flex items-center gap-3 text-[#b89146] border-b border-[#b89146]/20 pb-2 transition-all italic">
                📊 Tableau de Bord Receptionniste
            </a>
            <a href="{{ route('reservations.index') }}" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">
                📅 Réservations
            </a>
            <a href="{{ route('chambres.index') }}" class="block text-gray-400 hover:text-[#b89146] text-xs font-bold uppercase tracking-widest transition-all">
                🔑 Chambres
            </a>
        @endif
    </nav>

    <div class="text-[8px] text-gray-600 tracking-[3px] uppercase mb-4">
        © 2026 Hotelo Palace
    </div>

    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 text-red-400 text-[10px] font-bold uppercase tracking-[2px] border border-red-400/20 p-4 hover:bg-red-400/10 transition-all">
            <span>▮</span> Déconnexion
        </button>
    </form>
</aside>
