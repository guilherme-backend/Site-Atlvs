<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-slate-950 antialiased font-sans text-slate-100 relative overflow-hidden flex flex-col items-center justify-center">
        
        {{-- EFEITOS DE FUNDO (Glow Azul) --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-blue-600/20 blur-[120px] rounded-full -z-10 opacity-40 pointer-events-none"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b1a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b1a_1px,transparent_1px)] bg-[size:24px_24px] -z-20"></div>

        <div class="flex w-full max-w-md flex-col gap-8 p-6">
            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium transition-transform hover:scale-105" wire:navigate>
                <img src="{{ asset('img/logo.png') }}" alt="ATLVS" class="h-20 w-auto drop-shadow-[0_0_20px_rgba(37,99,235,0.4)]">
                <span class="sr-only">{{ config('app.name', 'ATLVS') }}</span>
            </a>

            {{-- CARD DE LOGIN --}}
            <div class="flex flex-col gap-6">
                <div class="rounded-2xl border border-slate-800 bg-slate-900/60 shadow-2xl shadow-blue-900/10 backdrop-blur-md text-slate-100 overflow-hidden relative group">
                    {{-- Borda brilhante sutil --}}
                    <div class="absolute inset-0 border border-white/5 rounded-2xl pointer-events-none"></div>
                    
                    <div class="px-8 py-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            
            <div class="text-center text-xs text-slate-500 font-medium">
                &copy; {{ date('Y') }} ATLVS. Todos os direitos reservados.
            </div>
        </div>

        @fluxScripts
    </body>
</html>