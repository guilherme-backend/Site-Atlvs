<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ATLVS') }}</title>

        <link rel="icon" href="{{ asset('img/icone.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    {{-- MUDANÇA: Slate em vez de Zinc --}}
    <body class="font-sans text-slate-100 antialiased bg-slate-950">
        
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-950 relative overflow-hidden">
            
            {{-- Brilho Azulado mais intenso e elegante --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/20 blur-[120px] rounded-full -z-10 opacity-40 pointer-events-none"></div>
            
            {{-- Grid de fundo --}}
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b1a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b1a_1px,transparent_1px)] bg-[size:24px_24px] -z-20"></div>

            <div class="mb-8 relative z-10">
                <a href="/">
                    {{-- Logo com sombra azulada --}}
                    <img src="{{ asset('img/logo.png') }}" alt="ATLVS" class="h-24 w-auto drop-shadow-[0_0_20px_rgba(37,99,235,0.4)]">
                </a>
            </div>

            {{-- Card de Login com fundo Slate Escuro --}}
            <div class="w-full sm:max-w-md mt-2 px-8 py-10 bg-slate-900/60 border border-slate-800 shadow-2xl shadow-blue-900/10 backdrop-blur-md overflow-hidden sm:rounded-2xl relative group">
                <div class="absolute inset-0 border border-white/5 rounded-2xl pointer-events-none"></div>
                
                {{ $slot }}
            </div>

            <div class="mt-8 text-slate-500 text-xs font-medium">
                &copy; {{ date('Y') }} ATLVS. Todos os direitos reservados.
            </div>
        </div>
    </body>
</html>