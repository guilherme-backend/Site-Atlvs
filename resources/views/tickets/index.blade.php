<x-layouts.app>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white mb-1">Meus Chamados</h1>
            <p class="text-slate-400">Gerencie suas solicitações de suporte e acompanhe o status.</p>
        </div>
        <a href="{{ route('tickets.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg shadow-blue-900/20 transition-all flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Abrir Novo Chamado
        </a>
    </div>

    <div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden shadow-xl backdrop-blur-sm">
        @if($tickets->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="bg-slate-900/80 text-slate-200 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-4">Assunto</th>
                            <th class="px-6 py-4">Prioridade</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Data</th>
                            <th class="px-6 py-4 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($tickets as $ticket)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4 font-medium text-white">
                                    {{ $ticket->subject }}
                                    <div class="text-xs text-slate-500 mt-0.5 truncate max-w-[200px]">{{ Str::limit($ticket->message, 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $priorities = [
                                            'baixa' => 'bg-slate-800 text-slate-300 border-slate-700',
                                            'media' => 'bg-yellow-500/10 text-yellow-500 border-yellow-500/20',
                                            'alta' => 'bg-red-500/10 text-red-400 border-red-500/20',
                                        ];
                                    @endphp
                                    <span class="px-2.5 py-1 rounded-lg text-xs font-bold border {{ $priorities[$ticket->priority] }}">
                                        {{ ucfirst($ticket->priority) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statuses = [
                                            'aberto' => 'text-blue-400',
                                            'respondido' => 'text-purple-400',
                                            'resolvido' => 'text-emerald-400',
                                        ];
                                        $icons = [
                                            'aberto' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                                            'respondido' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>',
                                            'resolvido' => '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>',
                                        ];
                                    @endphp
                                    <div class="flex items-center gap-2 {{ $statuses[$ticket->status] }}">
                                        {!! $icons[$ticket->status] !!}
                                        <span class="font-medium capitalize">{{ $ticket->status }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ticket->created_at->format('d/m/Y') }}
                                    <span class="text-xs text-slate-600 block">{{ $ticket->created_at->format('H:i') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-400 hover:text-white font-medium text-sm transition-colors">
                                        Ver detalhes &rarr;
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-slate-800 rounded-2xl flex items-center justify-center mb-4 text-slate-600">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-1">Nenhum chamado encontrado</h3>
                <p class="text-slate-500 mb-6 max-w-sm">Você ainda não abriu nenhum chamado de suporte. Se tiver algum problema, estamos aqui para ajudar.</p>
                <a href="{{ route('tickets.create') }}" class="bg-slate-800 hover:bg-slate-700 border border-slate-700 text-white px-6 py-2.5 rounded-xl transition-all font-medium">
                    Iniciar Atendimento
                </a>
            </div>
        @endif
    </div>
</x-layouts.app>