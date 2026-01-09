<x-layouts.app>
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-zinc-100">Visão Geral</h1>
            <p class="text-sm text-zinc-400">Bem-vindo à área do cliente ATLVS.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-400 text-xs font-medium border border-green-500/20 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                Sistemas Operacionais
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 rounded-xl bg-zinc-900/50 border border-zinc-800 shadow-sm relative overflow-hidden group hover:border-blue-500/30 transition-colors">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <p class="text-sm text-zinc-500 font-medium uppercase tracking-wider mb-1">Contrato Ativo</p>
            <h3 class="text-2xl font-bold text-white">Enterprise Plan</h3>
            <p class="text-xs text-zinc-400 mt-2">Renovação em: <span class="text-zinc-200">12/12/2026</span></p>
        </div>

        <div class="p-6 rounded-xl bg-zinc-900/50 border border-zinc-800 shadow-sm relative overflow-hidden group hover:border-blue-500/30 transition-colors">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <p class="text-sm text-zinc-500 font-medium uppercase tracking-wider mb-1">Suporte Técnico</p>
            <h3 class="text-2xl font-bold text-white">0 Chamados</h3>
            <p class="text-xs text-green-400 mt-2">Tudo funcionando normalmente</p>
        </div>

        <div class="p-6 rounded-xl bg-zinc-900/50 border border-zinc-800 shadow-sm relative overflow-hidden group hover:border-blue-500/30 transition-colors">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
            </div>
            <p class="text-sm text-zinc-500 font-medium uppercase tracking-wider mb-1">Uptime do Sistema</p>
            <h3 class="text-2xl font-bold text-white">99.9%</h3>
            <p class="text-xs text-zinc-400 mt-2">Última queda: <span class="text-zinc-200">Nenhuma</span></p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 bg-zinc-900/30 border border-zinc-800 rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-zinc-800 flex justify-between items-center">
                <h3 class="text-sm font-semibold text-zinc-200">Projetos em Andamento</h3>
                <button class="text-xs text-blue-400 hover:text-blue-300">Ver todos</button>
            </div>
            <div class="divide-y divide-zinc-800">
                <div class="px-6 py-4 flex items-center justify-between hover:bg-zinc-900/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Gestão Financeira v2.0</p>
                            <p class="text-xs text-zinc-500">Atualização de Módulo</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">Em Desenvolvimento</span>
                </div>
                <div class="px-6 py-4 flex items-center justify-between hover:bg-zinc-900/50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">App Mobile Corporativo</p>
                            <p class="text-xs text-zinc-500">Versão Android & iOS</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-800 text-zinc-400 border border-zinc-700">Aguardando Aprovação</span>
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="p-5 rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white shadow-lg relative overflow-hidden group cursor-pointer hover:shadow-blue-900/20 transition-all">
                <div class="absolute top-0 right-0 -mt-2 -mr-2 w-20 h-20 bg-white/10 rounded-full blur-xl group-hover:bg-white/20 transition-colors"></div>
                <h3 class="font-bold text-lg mb-1">Abrir Chamado</h3>
                <p class="text-blue-100 text-xs mb-4">Precisa de ajuda técnica?</p>
                <button class="text-xs font-semibold bg-white/20 hover:bg-white/30 px-3 py-1.5 rounded transition-colors">
                    Iniciar Suporte &rarr;
                </button>
            </div>

            <div class="p-5 rounded-xl bg-zinc-900/30 border border-zinc-800 hover:border-zinc-700 transition-colors">
                <h3 class="font-semibold text-zinc-200 mb-3 text-sm">Links Úteis</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="block text-xs text-zinc-400 hover:text-blue-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-zinc-600"></span> Documentação da API</a></li>
                    <li><a href="#" class="block text-xs text-zinc-400 hover:text-blue-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-zinc-600"></span> Segunda Via de Boleto</a></li>
                    <li><a href="#" class="block text-xs text-zinc-400 hover:text-blue-400 transition-colors flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-zinc-600"></span> Alterar Senha</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>