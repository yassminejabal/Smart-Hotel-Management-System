@extends('layouts.inscription')
@section('content')
    

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
@endsection
