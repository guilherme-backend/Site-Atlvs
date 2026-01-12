<x-layouts.app>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-white mb-1">Visão Geral</h1>
        <p class="text-slate-400">Bem-vindo à área do cliente ATLVS.</p>
    </div>

    {{-- CARDS DE ESTATÍSTICAS (Topo) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- Card Projetos --}}
        <div class="bg-slate-900/50 border border-slate-800 rounded-xl p-6 relative overflow-hidden group hover:border-blue-500/30 transition-all">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider mb-1">Projetos Ativos</p>
            <div class="text-3xl font-bold text-white">{{ $activeProjectsCount }}</div>
            <p class="text-xs text-slate-500 mt-2">Em desenvolvimento ou análise</p>
        </div>

        {{-- Card Suporte --}}
        <div class="bg-slate-900/50 border border-slate-800 rounded-xl p-6 relative overflow-hidden group hover:border-emerald-500/30 transition-all">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider mb-1">Suporte Técnico</p>
            <div class="text-3xl font-bold text-white">{{ $openTickets }} Chamados</div>
            <p class="text-xs text-emerald-400 mt-2">Nenhuma pendência crítica</p>
        </div>

        {{-- Card Status --}}
        <div class="bg-slate-900/50 border border-slate-800 rounded-xl p-6 relative overflow-hidden group hover:border-purple-500/30 transition-all">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider mb-1">Status ATLVS</p>
            <div class="text-3xl font-bold text-white">Online</div>
            <p class="text-xs text-purple-400 mt-2">Sistemas operacionais</p>
        </div>
    </div>

    {{-- LAYOUT PRINCIPAL (2 Colunas: Esquerda=Dados, Direita=Ações) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- COLUNA ESQUERDA (Projetos - Ocupa 2/3) --}}
        <div class="lg:col-span-2">
            <div class="bg-slate-900/50 border border-slate-800 rounded-xl overflow-hidden backdrop-blur-sm min-h-[400px]">
                <div class="p-6 border-b border-slate-800 flex justify-between items-center bg-slate-900/30">
                    <h3 class="font-bold text-white text-lg flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        Projetos Recentes
                    </h3>
                    <a href="{{ route('projects.index') }}" class="text-xs font-bold text-blue-400 hover:text-blue-300 uppercase tracking-wider">Ver todos</a>
                </div>

                <div class="divide-y divide-slate-800">
                    @forelse($recentProjects as $project)
                        <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between hover:bg-slate-800/50 transition-colors gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400 border border-slate-700 shrink-0">
                                    {{-- Ícone baseado no status (Visual extra) --}}
                                    @if($project->status == 'concluido')
                                        <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    @else
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-base font-bold text-white">{{ $project->name }}</h4>
                                    <p class="text-sm text-slate-500">Atualizado {{ $project->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto">
                                @php
                                    $statusClasses = [
                                        'analise' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                        'desenvolvimento' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                        'homologacao' => 'bg-purple-500/10 text-purple-400 border-purple-500/20',
                                        'concluido' => 'bg-green-500/10 text-green-400 border-green-500/20',
                                    ];
                                    $statusLabels = [
                                        'analise' => 'Em Análise',
                                        'desenvolvimento' => 'Desenvolvimento',
                                        'homologacao' => 'Homologação',
                                        'concluido' => 'Concluído',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold border uppercase tracking-wide {{ $statusClasses[$project->status] ?? 'text-slate-500' }}">
                                    {{ $statusLabels[$project->status] ?? 'Desconhecido' }}
                                </span>
                                <a href="{{ route('projects.show', $project) }}" class="p-2 text-slate-400 hover:text-white hover:bg-slate-700 rounded-lg transition-colors" title="Acessar Projeto">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center flex flex-col items-center justify-center h-full">
                            <div class="inline-flex p-4 rounded-full bg-slate-800 text-slate-500 mb-4">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <p class="text-slate-400 font-medium mb-1">Nenhum projeto iniciado.</p>
                            <p class="text-slate-500 text-sm">Utilize as opções ao lado para começar.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- COLUNA DIREITA (Ações e Links - Ocupa 1/3) --}}
        <div class="space-y-6">
            
            {{-- BLOCO DE AÇÕES PRINCIPAIS --}}
            <div class="space-y-4">
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">O que você deseja fazer?</h4>

                {{-- Botão Orçamento --}}
                <a href="{{ route('tickets.create_quote') }}" class="block p-5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 rounded-xl shadow-lg shadow-blue-900/20 transition-all group border border-blue-500/20 transform hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-white/10 rounded-lg text-white">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <span class="block font-bold text-white text-lg">Solicitar Orçamento</span>
                            <span class="text-blue-100 text-xs mt-1 block leading-relaxed">Tem uma ideia? Vamos tirar do papel. Inicie um novo projeto.</span>
                        </div>
                    </div>
                </a>

                {{-- Botão Relatar Problema --}}
                <a href="{{ route('tickets.create') }}" class="block p-5 bg-slate-800 hover:bg-slate-700 border border-slate-700 hover:border-purple-500 rounded-xl transition-all group transform hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-slate-900 rounded-lg text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <div>
                            <span class="block font-bold text-white">Relatar Problema</span>
                            <span class="text-xs text-slate-400 group-hover:text-slate-300">Suporte técnico especializado</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="h-px bg-slate-800 w-full my-6"></div>

            {{-- BLOCO DE ACESSO RÁPIDO --}}
            <div>
                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Acesso Rápido</h4>
                <div class="space-y-3">
                    
                    {{-- 1. Documentação da API --}}
                    <a href="{{ Route::has('docs.api') ? route('docs.api') : '#' }}" class="flex items-center justify-between p-3 bg-slate-900/50 border border-slate-800 rounded-xl hover:bg-slate-800 hover:border-slate-700 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-800 rounded-lg text-slate-400 group-hover:text-blue-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                            </div>
                            <span class="text-sm font-medium text-slate-300 group-hover:text-white">Documentação API</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-600 group-hover:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    {{-- 2. Segunda Via de Boleto --}}
                    <a href="{{ route('gestao.financeiro.index') }}" class="flex items-center justify-between p-3 bg-slate-900/50 border border-slate-800 rounded-xl hover:bg-slate-800 hover:border-slate-700 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-800 rounded-lg text-slate-400 group-hover:text-emerald-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            </div>
                            <span class="text-sm font-medium text-slate-300 group-hover:text-white">2ª Via Boleto</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-600 group-hover:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    {{-- 3. Alterar Senha --}}
                    <a href="{{ route('user-password.edit') }}" class="flex items-center justify-between p-3 bg-slate-900/50 border border-slate-800 rounded-xl hover:bg-slate-800 hover:border-slate-700 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-slate-800 rounded-lg text-slate-400 group-hover:text-purple-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <span class="text-sm font-medium text-slate-300 group-hover:text-white">Alterar Senha</span>
                        </div>
                        <svg class="w-4 h-4 text-slate-600 group-hover:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>