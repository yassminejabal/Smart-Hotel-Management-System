@extends('layouts.lendingpage')
@section('content')
    

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
@endsection
