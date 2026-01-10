<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
        <title>Admin Login - ATLVS</title>
    </head>
    {{-- MUDANÇA: Fundo Slate-950 --}}
    <body class="min-h-screen bg-slate-950 flex flex-col justify-center items-center font-sans antialiased text-white relative overflow-hidden">

        {{-- Fundo com brilho Azul Profundo (antes era vermelho) --}}
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-900/20 via-slate-950 to-slate-950 -z-10"></div>
        <div class="absolute top-0 w-full h-px bg-gradient-to-r from-transparent via-blue-900/50 to-transparent"></div>
        
        {{-- Grid de fundo para manter o padrão --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b1a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b1a_1px,transparent_1px)] bg-[size:24px_24px] -z-20 pointer-events-none"></div>

        <div class="w-full sm:max-w-md px-8 py-10 bg-slate-900/70 backdrop-blur-xl border border-slate-800 shadow-2xl rounded-2xl relative">
            
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('img/logo.png') }}" class="h-12 w-auto mb-6 drop-shadow-[0_0_15px_rgba(37,99,235,0.4)]" alt="Logo">
                
                {{-- Tag "Admin" agora em Azul --}}
                <h2 class="text-xs font-bold text-blue-400 tracking-[0.2em] uppercase border border-blue-500/30 px-3 py-1 rounded-full bg-blue-500/10 shadow-[0_0_10px_rgba(59,130,246,0.1)]">
                    Acesso Administrativo
                </h2>
            </div>

            <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-6">
                @csrf

                <flux:input 
                    name="email" 
                    label="E-mail Corporativo" 
                    type="email" 
                    required 
                    autofocus 
                    placeholder="admin@atlvs.com.br"
                    class="bg-slate-950/50 border-slate-700 focus:border-blue-500"
                />

                <flux:input 
                    name="password" 
                    label="Senha de Acesso" 
                    type="password" 
                    required 
                    placeholder="••••••••"
                    class="bg-slate-950/50 border-slate-700 focus:border-blue-500"
                    viewable
                />

                {{-- Botão Azul Intenso --}}
                <flux:button type="submit" variant="primary" class="w-full font-bold shadow-lg shadow-blue-900/20 bg-blue-600 hover:bg-blue-500 border-none h-10">
                    Entrar no Painel
                </flux:button>
            </form>
        </div>

        <div class="mt-8 text-slate-500 text-[10px] uppercase tracking-wider font-medium">
            Sistema Interno v1.0 &bull; Acesso Monitorado
        </div>

        @fluxScripts
    </body>
</html>