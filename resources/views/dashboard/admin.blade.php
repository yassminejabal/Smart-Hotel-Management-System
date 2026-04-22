@extends('layouts.app')
@section('content')

    
    <div class="w-full p-12 animate-slide-up">
        @if(session('success'))
            <div class="bg-green-500/10 border border-green-500 text-green-500 px-6 py-4 rounded mb-8 relative flex items-center shadow-lg" role="alert">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                
                <span class="block sm:inline font-semibold text-sm tracking-wide">{{ session('success') }}</span>
                
                <button onclick="this.parentElement.style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-500 hover:text-green-700">
                    <svg class="fill-current h-5 w-5" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </button>
            </div>
        @endif
        <header class="flex justify-between items-end mb-16 relative">
            <div>
                <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Administration Palace</span>
                <h1 class="font-playfair text-white text-6xl leading-tight">Tableau <br>de Bord</h1>
            </div>
            <div class="text-right hidden md:block">
                <div class="w-16 h-[2px] bg-[#b89146] ml-auto mb-4"></div>
                <p class="text-gray-400 text-[10px] uppercase tracking-[4px]">Rapports en Temps Réel</p>
            </div>
        </header>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-[#b89146]/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-[#b89146]"></div>
                <h2 class="text-[#b89146] text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Total Réservations</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $totalReservations }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
            
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-green-500/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-green-500"></div>
                <h2 class="text-green-500 text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Chambres Disponibles</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $disponibles }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
            
            <div class="bg-white/5 border border-white/10 p-10 backdrop-blur-md relative overflow-hidden group hover:border-red-500/50 transition-all duration-500 shadow-2xl">
                <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                <h2 class="text-red-500 text-[10px] font-bold tracking-[4px] uppercase mb-6 italic">Chambres Occupées</h2>
                <p class="text-5xl font-playfair text-white tracking-wider">{{ $occupees }}</p>
                <div class="mt-4 w-12 h-[1px] bg-white/20 group-hover:w-full transition-all duration-700"></div>
            </div>
        </div>

        <div class="bg-white shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[6px] bg-[#b89146]"></div>
            
            <div class="p-8 border-b border-gray-100 flex justify-between items-center">
                <h2 class="font-playfair text-2xl text-[#0a1118] tracking-wide">
                    Liste des users
                </h2>
                <span class="text-[9px] font-bold text-gray-400 uppercase tracking-[3px]">Hébergement Palace</span>
            </div>

            <div class="overflow-x-auto">
               <table class="w-full text-left border-collapse">
    <thead>
        <tr class="text-gray-400 text-[9px] tracking-[3px] uppercase border-b border-gray-50">
            <th class="p-6">ID</th>
            <th class="p-6">Nom complet</th>
            <th class="p-6">Email</th>  
            <th class="p-6">Téléphone</th>
            <th class="p-6">Rôle</th>
            <th class="p-6">Adresse</th>
            <th class="p-6">Naissance</th>
            <th class="p-6 text-center">Actions</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-50 text-gray-900">
        @foreach ($users as $user)
            <tr class="hover:bg-gray-50/50 transition duration-300">
                <td class="p-6">
                    <span class="text-[#b89146] font-bold text-xs italic">#{{ $user->id }}</span>
                </td>
                <td class="p-6">
                    <p class="text-sm font-bold text-[#0a1118]">
                        {{ $user->name }} {{ $user->prenom }}
                    </p>
                </td>
                <td class="p-6">
                    <p class="text-xs text-[#0a1118]">{{ $user->email }}</p>
                </td>
                <td class="p-6">
                    <p class="text-[10px] text-gray-400">{{ $user->telephone }}</p>
                </td>
                <td class="p-6">
                    <span class="text-xs font-semibold px-2 py-1 rounded">
                        {{ $user->role }}
                    </span>
                </td>
                <td class="p-6">
                    <p class="text-xs text-gray-600 italic">{{ $user->adresse }}</p>
                </td>
                <td class="p-6">
                    <span class="text-[10px] font-medium text-gray-400">
                        {{ $user->date_naissance }}
                    </span>
                </td>
                
              
                
                <td class="p-6 text-center align-middle">
                    @if(auth()->id() !== $user->id)
                        <form action="{{ route('users.toogleban', $user->id) }}" method="POST" class="inline-block m-0">
                            @csrf
                            @method('PATCH')
                            
                            @if($user->is_banne)
                                <button type="submit" class="w-24 py-2 bg-white border border-green-500/30 text-green-600 text-[9px] uppercase tracking-[2px] font-bold hover:bg-green-500 hover:text-white hover:border-green-500 hover:shadow-lg hover:shadow-green-500/20 transition-all duration-300 rounded-sm">
                                    Débannir
                                </button>
                            @else
                                <button type="submit" class="w-24 py-2 bg-white border border-red-500/30 text-red-600 text-[9px] uppercase tracking-[2px] font-bold hover:bg-red-500 hover:text-white hover:border-red-500 hover:shadow-lg hover:shadow-red-500/20 transition-all duration-300 rounded-sm">
                                    Bannir
                                </button>
                            @endif
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    {{ $users->links() }}
</table>
            </div>
        </div>
    </div>

    <style>
        .animate-slide-up {
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Scrollbar for the table if needed */
        .overflow-x-auto::-webkit-scrollbar {
            height: 4px;
        }
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #b89146;
        }
    </style>

@endsection