<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js'])
</head>
<body class="bg-dashboard min-h-screen flex">
    <x-sidebar />
    
    <main class="ml-72 flex-1 p-20">
        @yield('content')
    </main>
    
</body>
</html>