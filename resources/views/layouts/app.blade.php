<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Menara Hijau Booking App Manager</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon.png') }}">

        <!-- Tambahkan di <head> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@2.0.0/dist/preline.css">
        <script src="https://cdn.jsdelivr.net/npm/preline@2.0.0/dist/preline.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col bg-gray-white">
    
            @include('layouts.navigation')
        
            <main class="flex-1">
              @isset($header)
                <header class="bg-white shadow">
                  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                  </div>
                </header>
              @endisset
        
              {{ $slot }}
            </main>
        
            @include('layouts.footer')
            
          </div>
    </body>
</html>
