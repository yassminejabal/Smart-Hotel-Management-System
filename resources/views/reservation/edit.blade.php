<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Modifier Réservation Palace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        .bg-luxury-palace {
            background-image: linear-gradient(rgba(10, 17, 24, 0.94), rgba(10, 17, 24, 0.94)), 
                            url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center; background-attachment: fixed;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up { animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
    </style>
</head>
<body class="bg-luxury-palace min-h-screen flex items-center justify-center font-inter p-6">

    <div class="w-full max-w-5xl bg-white shadow-[0_35px_60px_-15px_rgba(0,0,0,0.5)] border-t-[6px] border-[#b89146] p-12 animate-slide-up overflow-hidden relative my-10">
        
        <div class="absolute top-0 right-0 p-8 opacity-[0.03] pointer-events-none">
            <h1 class="text-9xl font-playfair uppercase">Hotel</h1>
        </div>

        <header class="text-center mb-10 relative">
            <span class="text-[10px] text-[#b89146] font-bold tracking-[8px] uppercase italic mb-3 block">Service de Conciergerie</span>
            <h1 class="font-playfair text-5xl text-[#0a1118] uppercase leading-tight">Modification de <br>Séjour</h1>
            <div class="w-16 h-[2px] bg-[#b89146] mx-auto mt-6"></div>
            <p class="text-gray-400 text-[10px] mt-4 uppercase tracking-[4px]">Dossier Réservation : #{{ $reservation->id }}</p>
        </header>

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="space-y-12">
            @csrf
            @method('PUT')

            <section class="group">
                <div class="flex items-center gap-4 mb-8">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#0a1118] text-white text-xs font-bold">01</span>
                    <h2 class="font-playfair text-2xl text-[#0a1118] tracking-wide">Détails du Client</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    <div class="md:col-span-2 group">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block group-focus-within:text-[#b89146] transition-colors">Sélectionner un Client Existant</label>
                        <select name="client_id" class="w-full p-4 bg-gray-50 border-b-2 border-transparent focus:border-[#b89146] focus:bg-white text-sm outline-none transition-all duration-300 cursor-pointer shadow-sm">
                            <option value="">-- Nouveau Client / Modifier les infos ci-dessous --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ (old('client_id', $reservation->client_id) == $client->id) ? 'selected' : '' }}>
                                    {{ $client->nom }} {{ $client->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $reservation->client->nom) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all @error('nom') border-red-500 @enderror">
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom', $reservation->client->prenom) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all">
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Email de contact</label>
                        <input type="email" name="email" value="{{ old('email', $reservation->client->email) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all">
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Téléphone</label>
                        <input type="text" name="telephone" value="{{ old('telephone', $reservation->client->telephone) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all">
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Date de Naissance</label>
                        <input type="date" name="date_naissance" value="{{ old('date_naissance', $reservation->client->date_naissance) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all">
                    </div>

                    <div class="relative">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-2 block">Adresse</label>
                        <input type="text" name="adresse" value="{{ old('adresse', $reservation->client->adresse) }}" 
                               class="w-full p-4 bg-gray-50 border-transparent border-b-2 focus:border-[#b89146] text-sm outline-none transition-all">
                    </div>
                </div>
            </section>

            <section class="group">
                <div class="flex items-center gap-4 mb-8">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#0a1118] text-white text-xs font-bold">02</span>
                    <h2 class="font-playfair text-2xl text-[#0a1118] tracking-wide">Détails de la Réservation</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-50/50 p-8 rounded-sm">
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block italic">Check-In</label>
                        <input type="date" name="check_in" value="{{ old('check_in', $reservation->check_in) }}" 
                               class="w-full p-4 border-b-2 border-gray-200 focus:border-[#b89146] bg-transparent outline-none text-sm transition-all 
                               ">
                    </div>
                    
                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block italic">Check-Out</label>
                        <input type="date" name="check_out" value="{{ old('check_out', $reservation->check_out) }}" 
                               class="w-full p-4 border-b-2 border-gray-200 focus:border-[#b89146] bg-transparent outline-none text-sm transition-all 
                               ">
                    </div>

                    <div>
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block italic">Nombre d'invités</label>
                        <input type="number" name="invitees" min="1" value="{{ old('invitees', $reservation->invitees) }}" 
                               class="w-full p-4 border-b-2 border-gray-200 focus:border-[#b89146] bg-transparent outline-none text-sm transition-all 
                               ">
                    </div>

                    <div class="md:col-span-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block italic">Chambre</label>
                        <select name="chambre_id" class="w-full p-4 border-b-2 border-gray-200 focus:border-[#b89146] bg-transparent outline-none text-sm cursor-pointer">
                                                    @foreach ($Chambres as $chambre)
                                <option value="{{ $chambre->id }}" {{ old('chambre_id', $reservation->chambre_id) == $chambre->id ? 'selected' : '' }}>
                                    N°{{ $chambre->number_Chambre }} ({{ $chambre->type }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-1">
                        <label class="text-[10px] font-bold text-[#b89146] uppercase tracking-widest mb-2 block">Prix Total</label>
                        <div class="relative">
                            <input type="number" step="0.01" name="total_price" value="{{ old('total_price', $reservation->total_price) }}" 
                                   class="w-full p-4 bg-white border-2 border-[#b89146]/20 focus:border-[#b89146] text-[#b89146] font-bold text-lg outline-none transition-all">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-bold text-[#b89146]">MAD</span>
                        </div>
                    </div>

                    <div class="md:col-span-1">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block italic">Statut Dossier</label>
                        <div class="flex flex-col gap-2">
                            <select name="status" class="p-3 border border-gray-200 focus:border-[#0a1118] bg-white outline-none text-[10px] font-bold uppercase tracking-widest transition-all">
                                <option value="en_attente">🕒 Attente</option>
                                <option value="confirmee">✅ Confirmée</option>
                                <option value="annulee">❌ Annulée</option>
                            </select>
                            
                       <select name="payment_status" class="p-3 border border-gray-200">
                            <option value="En attente" {{ old('payment_status', $reservation->payment_status) == 'En attente' ? 'selected' : '' }}>
                                💳 En attente
                            </option>
                            <option value="Payé" {{ old('payment_status', $reservation->payment_status) == 'Payé' ? 'selected' : '' }}>
                                💰 Payé
                            </option>
                            <option value="Échoué" {{ old('payment_status', $reservation->payment_status) == 'Échoué' ? 'selected' : '' }}>
                                ❌ Échoué
                            </option>
                        </select>
                        </div>
                    </div>
                </div>
            </section>

            <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-12 border-t border-gray-100">
                <a href="{{ route('reservations.index') }}" class="group flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-[3px] hover:text-red-600 transition-all">
                    <span class="group-hover:-translate-x-1 transition-transform">←</span> Annuler et quitter
                </a>
                
                <button type="submit" class="w-full md:w-auto py-6 px-20 bg-[#0a1118] text-white text-[11px] font-bold uppercase tracking-[5px] hover:bg-[#b89146] hover:scale-[1.02] active:scale-[0.98] transition-all duration-500 shadow-[0_20px_40px_rgba(0,0,0,0.2)]">
                    Mettre à jour la Réservation
                </button>
            </div>
        </form>
    </div>

</body>
</html>