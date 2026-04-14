@extends('layouts.app')
@section('content')
    <div class="w-full">
        
        <h1 class="font-playfair text-white text-5xl text-right mb-12 opacity-90">Tableau de Bord Admin</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 border-t-4 border-[#b89146] shadow-2xl">
                <h2 class="text-[#b89146] text-[12px] font-bold tracking-[3px] uppercase mb-6">Total Réservations</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $totalReservations ?? 0 }}</p>
            </div>
            
            <div class="bg-white p-8 border-t-4 border-green-500 shadow-2xl">
                <h2 class="text-green-600 text-[12px] font-bold tracking-[3px] uppercase mb-6">Disponibles</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $disponibles ?? 0 }}</p>
            </div>
            
            <div class="bg-white p-8 border-t-4 border-red-500 shadow-2xl">
                <h2 class="text-red-600 text-[12px] font-bold tracking-[3px] uppercase mb-6">Occupées</h2>
                <p class="text-4xl font-bold text-gray-800">{{ $occupees ?? 0 }}</p>
            </div>
        </div>
        
    </div>
@endsection