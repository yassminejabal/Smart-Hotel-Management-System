@extends('layouts.app')
@section('content')

<div class="w-full p-12">

    <header class="flex justify-between items-end mb-12 relative">
        <div>
            <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">
                Service de Conciergerie
            </span>
            <h1 class="font-playfair text-white text-6xl leading-tight">
                Nouvelle <br>Réservation
            </h1>
        </div>
    </header>

    <form action="{{ route('reservations.getchamberdispo') }}" method="POST" class="space-y-10">
        @csrf
        <section class="bg-white/5 border border-white/10 p-10 backdrop-blur-md shadow-2xl relative">

            <div class="absolute top-0 left-0 w-full h-[2px] bg-[#b89146]/50"></div>

            <div class="flex items-center gap-4 mb-10 text-[#b89146]">
                <span class="flex items-center justify-center w-8 h-8 rounded-full border border-[#b89146] text-xs font-bold">
                    01
                </span>
                <h2 class="font-playfair text-2xl text-white tracking-wide">
                    Choisir les Dates
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">
                        Check-In
                    </label>
                    <input type="date" name="check_in"
                           class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block italic">
                        Check-Out
                    </label>
                    <input type="date" name="check_out"
                           class="w-full p-4 bg-white/5 border border-white/10 focus:border-[#b89146] text-sm text-white outline-none">
                </div>

            </div>

        </section>
        <div class="flex justify-between items-center pt-10 border-t border-white/5">

            <a href="{{ route('reservations.index') }}"
               class="text-[10px] font-bold text-gray-500 uppercase tracking-[3px] hover:text-red-500 transition-all">
                ← Annuler
            </a>

            <button type="submit"
                    class="bg-[#b89146] text-[#0a1118] px-16 py-6 text-[11px] font-bold uppercase tracking-[5px] hover:bg-white hover:-translate-y-1 transition-all duration-500 shadow-xl">
                Continuer
            </button>

        </div>

    </form>
</div>

@endsection