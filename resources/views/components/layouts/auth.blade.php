<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ATLVS') }}</title>

        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="min-h-screen bg-zinc-950 text-zinc-100 antialiased relative overflow-hidden flex flex-col justify-center items-center selection:bg-blue-600 selection:text-white">
        
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/20 blur-[120px] rounded-full -z-10 opacity-40 pointer-events-none"></div>
        
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] -z-20"></div>

        <div class="w-full max-w-[400px] px-6 relative z-10 flex flex-col items-center">
            
            <div class="mb-8">
                <a href="/" wire:navigate>
                    <img src="{{ asset('img/logo.png') }}" alt="ATLVS" class="h-20 w-auto drop-shadow-2xl">
                </a>
            </div>

            <div class="w-full bg-zinc-900/60 border border-zinc-800 shadow-2xl backdrop-blur-xl rounded-2xl p-6 sm:p-8 relative group">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
                
                {{ $slot }}
            </div>

            <div class="mt-8 text-center">
                <p class="text-xs text-zinc-600">
                    &copy; {{ date('Y') }} ATLVS Tecnologia.<br>Todos os direitos reservados.
                </p>
            </div>
        </div>

        @fluxScripts
    </body>
</html>