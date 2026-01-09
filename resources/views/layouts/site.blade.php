<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>@yield('title', 'ATLVS - Sistemas e Soluções em Tecnologia')</title>
        
        <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <style>
            body { background-color: #09090b; }
            html { scroll-behavior: smooth; }
        </style>
    </head>
    <body class="font-sans antialiased text-zinc-100 bg-zinc-950 selection:bg-blue-600 selection:text-white" x-data="{ mobileMenuOpen: false }">

        <nav class="fixed w-full z-50 bg-zinc-950/80 border-b border-zinc-800 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-20 items-center justify-between md:justify-start">
                    
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo ATLVS" class="h-[25px] w-auto mr-5">
                        </a>
                        <a href="{{ route('home') }}" class="font-bold text-xl tracking-tight text-white z-10">ATLVS</a>
                    </div>

                    <div class="hidden md:flex items-center w-full ml-16">
                        <div class="flex space-x-8">
                            <a href="{{ route('home') }}#solucoes" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Soluções</a>
                            <a href="{{ route('home') }}#setores" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">Setores</a>
                            <a href="{{ route('home') }}#sobre" class="text-sm font-medium text-zinc-400 hover:text-white transition-colors">A Empresa</a>
                        </div>

                        <div class="flex items-center gap-4 ml-auto">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-zinc-300 hover:text-white">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm font-medium text-zinc-300 hover:text-white whitespace-nowrap">Área do Cliente</a>
                                @endauth
                            @endif
                            <a href="{{ route('contact') }}" class="bg-white text-zinc-950 hover:bg-zinc-200 text-sm font-semibold py-2.5 px-5 rounded-lg transition-all shadow-sm whitespace-nowrap">
                                Falar com especialista
                            </a>
                        </div>
                    </div>

                    <div class="flex md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="text-zinc-400 hover:text-white p-2">
                            <span class="sr-only">Abrir menu</span>
                            <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div x-show="mobileMenuOpen" 
                 class="md:hidden bg-zinc-950 border-b border-zinc-800 absolute w-full left-0 top-20 shadow-2xl" 
                 x-cloak>
                <div class="px-4 pt-2 pb-6 space-y-1">
                    <a href="{{ route('home') }}#solucoes" class="block px-3 py-3 text-base font-medium text-zinc-300 hover:text-white hover:bg-zinc-900 rounded-md">Soluções</a>
                    <a href="{{ route('home') }}#setores" class="block px-3 py-3 text-base font-medium text-zinc-300 hover:text-white hover:bg-zinc-900 rounded-md">Setores</a>
                    <a href="{{ route('home') }}#sobre" class="block px-3 py-3 text-base font-medium text-zinc-300 hover:text-white hover:bg-zinc-900 rounded-md">A Empresa</a>
                    <div class="border-t border-zinc-800 my-2 pt-2">
                         <a href="{{ route('contact') }}" class="block px-3 py-3 text-base font-medium text-blue-400 hover:text-blue-300">Falar com especialista</a>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="bg-black border-t border-zinc-900 pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo ATLVS" class="h-10 w-auto">
                        <div>
                            <span class="font-bold text-lg text-zinc-300 block leading-none">ATLVS</span>
                            <span class="text-[10px] text-zinc-600 uppercase tracking-widest">Sistemas e Soluções</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-zinc-500 font-medium">ATLVS Sistemas e Soluções em Tecnologia Ltda</p>
                        <p class="text-xs text-zinc-600 mt-1">© {{ date('Y') }} Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>