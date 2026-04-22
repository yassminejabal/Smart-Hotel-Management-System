<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTELO | Inscription Luxury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;600;700&display=swap');
        
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .bg-palace {
            background-image: linear-gradient(rgba(10, 17, 24, 0.9), rgba(10, 17, 24, 0.9)), 
                              url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="bg-palace min-h-screen flex items-center justify-center font-inter p-6">

    <div class="w-full max-w-md bg-white/5 border border-white/10 p-10 backdrop-blur-xl shadow-[0_50px_100px_rgba(0,0,0,0.5)] relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-[4px] bg-[#b89146]"></div>
        
        <header class="text-center mb-10">
            <h1 class="font-playfair text-5xl tracking-[8px] text-white uppercase">Hotelo</h1>
            <p class="text-[#b89146] text-[10px] font-bold tracking-[5px] uppercase mt-3 italic">Inscription Palace</p>
        </header>
        @yield('content')


        </body>
</html>