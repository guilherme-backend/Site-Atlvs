<x-layouts.app>
    <div class="max-w-5xl mx-auto h-[calc(100vh-140px)] flex flex-col">
        
        {{-- Cabeçalho do Chamado --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 shrink-0">
            <div class="flex items-center gap-4">
                <a href="{{ route('tickets.index') }}" class="p-2 rounded-lg bg-slate-900 border border-slate-800 text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-bold text-white tracking-tight">Chamado #{{ $ticket->id }}</h1>
                        @php
                            $statuses = [
                                'aberto' => 'bg-blue-500/10 text-blue-400 border-blue-500/20',
                                'respondido' => 'bg-purple-500/10 text-purple-400 border-purple-500/20',
                                'resolvido' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                            ];
                        @endphp
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold border uppercase tracking-wider {{ $statuses[$ticket->status] ?? 'bg-slate-800 text-slate-400' }}">
                            {{ $ticket->status }}
                        </span>
                    </div>
                    <p class="text-slate-400 text-sm mt-1">{{ $ticket->subject }}</p>
                </div>
            </div>
            
            <div class="text-right hidden md:block">
                <p class="text-xs text-slate-500 uppercase tracking-wider font-bold">Criado em</p>
                <p class="text-slate-300 text-sm">{{ $ticket->created_at->format('d/m/Y \à\s H:i') }}</p>
            </div>
        </div>

        {{-- Área Principal: Conteúdo e Chat --}}
        <div class="flex-1 min-h-0 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Coluna da Esquerda: Descrição Original --}}
            <div class="lg:col-span-1 space-y-6 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-slate-800">
                <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                        Descrição do Problema
                    </h3>
                    <div class="prose prose-invert prose-sm text-slate-300 leading-relaxed">
                        {!! nl2br(e($ticket->message)) !!}
                    </div>
                </div>

                <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Detalhes Técnicos</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between py-2 border-b border-slate-800/50">
                            <span class="text-slate-500">Prioridade</span>
                            <span class="text-white capitalize">{{ $ticket->priority }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-800/50">
                            <span class="text-slate-500">Solicitante</span>
                            <span class="text-white">{{ $ticket->user->name }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-slate-500">Última Atualização</span>
                            <span class="text-white">{{ $ticket->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Coluna da Direita: Chat (Ocupa o resto e estica) --}}
            <div class="lg:col-span-2 bg-slate-900/80 border border-slate-800 rounded-2xl flex flex-col overflow-hidden shadow-2xl relative">
                
                {{-- Efeito de fundo no chat --}}
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b1a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b1a_1px,transparent_1px)] bg-[size:16px_16px] pointer-events-none opacity-30"></div>

                {{-- Header do Chat --}}
                <div class="p-4 border-b border-slate-800 bg-slate-950/50 backdrop-blur-sm z-10 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-sm font-bold text-slate-200">Histórico de Conversa</span>
                    </div>
                </div>

                {{-- Mensagens (Scrollável) --}}
                <div id="messages-container" class="flex-1 overflow-y-auto p-6 space-y-6 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent z-10">
                    
                    {{-- Abertura do Ticket (Mensagem Inicial) --}}
                    <div class="flex justify-end">
                        <div class="max-w-[85%]">
                            <div class="flex items-center justify-end gap-2 mb-1">
                                <span class="text-[10px] font-bold text-slate-400 uppercase">Você</span>
                                <span class="text-[10px] text-slate-600">{{ $ticket->created_at->format('H:i') }}</span>
                            </div>
                            <div class="bg-blue-600 text-white p-4 rounded-2xl rounded-tr-none shadow-md text-sm leading-relaxed">
                                {{ $ticket->message }}
                            </div>
                        </div>
                    </div>

                    {{-- Loop das Respostas --}}
                    @foreach($ticket->messages as $msg)
                        <div class="flex {{ $msg->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                            <div class="max-w-[85%]">
                                <div class="flex items-center gap-2 mb-1 {{ $msg->user_id === auth()->id() ? 'justify-end' : '' }}">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase">
                                        {{ $msg->user_id === auth()->id() ? 'Você' : ($msg->user->role === 'admin' ? 'Suporte ATLVS' : $msg->user->name) }}
                                    </span>
                                    <span class="text-[10px] text-slate-600">{{ $msg->created_at->format('H:i') }}</span>
                                </div>
                                <div class="p-4 rounded-2xl shadow-md text-sm leading-relaxed 
                                    {{ $msg->user_id === auth()->id() 
                                        ? 'bg-blue-600 text-white rounded-tr-none' 
                                        : 'bg-slate-800 text-slate-200 border border-slate-700 rounded-tl-none' }}">
                                    {{ $msg->message }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- Formulário de Envio --}}
                <div class="p-4 bg-slate-950/80 border-t border-slate-800 z-10">
                    @if($ticket->status !== 'resolvido')
                        <form action="{{ route('tickets.reply', $ticket) }}" method="POST" class="flex gap-3">
                            @csrf
                            <input type="text" name="message" required placeholder="Digite sua resposta..." autocomplete="off"
                                class="flex-1 bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all placeholder-slate-600">
                            
                            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white p-3 rounded-xl transition-all shadow-lg shadow-blue-900/20 group">
                                <svg class="w-5 h-5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9-2-9-18-9 18 9 2zm0 0v-8"/>
                                </svg>
                            </button>
                        </form>
                    @else
                        <div class="text-center py-2 text-slate-500 text-sm bg-slate-900/50 rounded-lg border border-slate-800 border-dashed">
                            Este chamado foi encerrado. <a href="{{ route('tickets.create') }}" class="text-blue-400 hover:text-blue-300">Abrir novo</a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- Script para rolar o chat para o final --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById('messages-container');
            container.scrollTop = container.scrollHeight;
        });
    </script>
</x-layouts.app>