<x-layouts.app>
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-white mb-1">Central de Suporte</h1>
            <p class="text-slate-400">Gerencie as solicitações e dúvidas dos clientes.</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-lg px-4 py-2 text-slate-400 text-sm">
            Total: <strong class="text-white">{{ $tickets->count() }}</strong> chamados
        </div>
    </div>

    <div class="bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden shadow-xl backdrop-blur-sm">
        @if($tickets->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="bg-slate-900/80 text-slate-200 uppercase font-bold text-xs">
                        <tr>
                            <th class="px-6 py-4">Cliente / Empresa</th>
                            <th class="px-6 py-4">Assunto</th>
                            <th class="px-6 py-4">Prioridade</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Última Atualização</th>
                            <th class="px-6 py-4 text-right">Ação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($tickets as $ticket)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-white">{{ $ticket->user->name }}</div>
                                    <div class="text-xs text-slate-500">{{ $ticket->user->email }}</div>
                                </td>
                                <td class="px-6 py-4 font-medium text-slate-200">
                                    {{ Str::limit($ticket->subject, 30) }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $priorities = [
                                            'baixa' => 'text-slate-400 bg-slate-800/50',
                                            'media' => 'text-yellow-500 bg-yellow-500/10 border-yellow-500/20',
                                            'alta' => 'text-red-400 bg-red-500/10 border-red-500/20',
                                        ];
                                    @endphp
                                    <span class="px-2 py-1 rounded-md text-xs font-bold border border-transparent {{ $priorities[$ticket->priority] }}">
                                        {{ ucfirst($ticket->priority) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusColors = [
                                            'aberto' => 'text-blue-400',
                                            'respondido' => 'text-purple-400',
                                            'resolvido' => 'text-emerald-400',
                                        ];
                                    @endphp
                                    <span class="flex items-center gap-2 {{ $statusColors[$ticket->status] }} font-bold text-xs uppercase tracking-wider">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    {{ $ticket->updated_at->format('d/m/Y H:i') }}
                                    <span class="block text-slate-600">{{ $ticket->updated_at->diffForHumans() }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('admin.tickets.show', $ticket) }}" class="bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-1.5 px-3 rounded-lg transition-colors">
                                        Atender
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center">
                <p class="text-slate-500">Nenhum chamado registrado até o momento.</p>
            </div>
        @endif
    </div>
</x-layouts.app>