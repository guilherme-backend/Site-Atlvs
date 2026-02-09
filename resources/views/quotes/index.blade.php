<x-layouts.app>
    <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white mb-1">Meus Orçamentos</h1>
            <p class="text-slate-400">Acompanhe suas solicitações de projeto e negociações.</p>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="bg-slate-900 border border-slate-800 rounded-lg px-4 py-2 text-slate-400 text-sm">
                Total: <strong class="text-white">{{ $quotes->count() }}</strong>
            </div>
            
            {{-- Botão Nova Solicitação --}}
            <a href="{{ route('quotes.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg shadow-blue-900/20 transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Solicitar Novo
            </a>
        </div>
    </div>

    <div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden shadow-xl backdrop-blur-sm">
        @if($quotes->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="bg-slate-900/80 text-slate-200 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-4">Assunto / Projeto</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Última Atualização</th>
                            <th class="px-6 py-4 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($quotes as $quote)
                            <tr class="hover:bg-slate-800/30 transition-colors group">
                                <td class="px-6 py-4 font-medium text-white">
                                    {{ Str::limit($quote->subject, 40) }}
                                    <div class="text-xs text-slate-500 mt-1 font-normal line-clamp-1">{{ $quote->message }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusColors = [
                                            'aberto' => 'text-blue-400 bg-blue-500/10 border-blue-500/20',
                                            'respondido' => 'text-purple-400 bg-purple-500/10 border-purple-500/20',
                                            'fechado' => 'text-emerald-400 bg-emerald-500/10 border-emerald-500/20',
                                        ];
                                        $statusLabels = [
                                            'aberto' => 'Em Análise',
                                            'respondido' => 'Respondido',
                                            'fechado' => 'Fechado/Virou Projeto',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold border uppercase tracking-wide {{ $statusColors[$quote->status] ?? 'text-slate-400 border-slate-700 bg-slate-800' }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                        {{ $statusLabels[$quote->status] ?? $quote->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    {{ $quote->updated_at->format('d/m/Y') }}
                                    <span class="text-slate-600 ml-1">{{ $quote->updated_at->format('H:i') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('quotes.show', $quote) }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold py-2 px-4 rounded-lg transition-colors border border-slate-700 hover:border-slate-600">
                                        Ver Negociação
                                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Paginação --}}
            <div class="px-6 py-4 border-t border-slate-800">
                {{ $quotes->links() }}
            </div>
        @else
            <div class="p-16 text-center flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-slate-800 rounded-full flex items-center justify-center mb-4 text-slate-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-1">Nenhum orçamento solicitado</h3>
                <p class="text-slate-500 max-w-sm mb-6">Tem uma ideia de projeto? Solicite um orçamento e nossa equipe analisará a viabilidade.</p>
                <a href="{{ route('quotes.create') }}" class="text-blue-400 hover:text-blue-300 font-bold text-sm">
                    + Iniciar Solicitação
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>