<x-layouts.app>
    <div class="max-w-6xl mx-auto h-[calc(100vh-140px)] flex flex-col">
        
        {{-- Header Admin --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 shrink-0 bg-slate-900/50 p-4 rounded-xl border border-slate-800">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.tickets.index') }}" class="p-2 rounded-lg hover:bg-slate-800 text-slate-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-white flex items-center gap-2">
                        Ticket #{{ $ticket->id }}
                        <span class="text-sm font-normal text-slate-500">por {{ $ticket->user->name }}</span>
                    </h1>
                    <p class="text-blue-400 text-sm font-medium">{{ $ticket->subject }}</p>
                </div>
            </div>

            {{-- Controles de Status --}}
            <form action="{{ route('admin.tickets.status', $ticket) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="bg-slate-950 border border-slate-700 text-slate-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2">
                    <option value="aberto" {{ $ticket->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
                    <option value="respondido" {{ $ticket->status == 'respondido' ? 'selected' : '' }}>Respondido</option>
                    <option value="resolvido" {{ $ticket->status == 'resolvido' ? 'selected' : '' }}>Resolvido (Fechar)</option>
                </select>
            </form>
        </div>

        <div class="flex-1 min-h-0 grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Coluna Direita: Chat --}}
            <div class="lg:col-span-2 bg-slate-900/80 border border-slate-800 rounded-2xl flex flex-col overflow-hidden shadow-2xl relative order-2 lg:order-1">
                {{-- Efeito de Fundo --}}
                <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b1a_1px,transparent_1px),linear-gradient(to_bottom,#1e293b1a_1px,transparent_1px)] bg-[size:16px_16px] pointer-events-none opacity-30"></div>

                {{-- Mensagens com Polling --}}
                <div id="messages-container" class="flex-1 overflow-y-auto p-6 space-y-6 scrollbar-thin scrollbar-thumb-slate-700 scrollbar-track-transparent z-10">
                    @include('admin.tickets.partials.messages')
                </div>

                {{-- Input de Resposta --}}
                <div class="p-4 bg-slate-950/80 border-t border-slate-800 z-10">
                    <form action="{{ route('admin.tickets.reply', $ticket) }}" method="POST" class="flex gap-3">
                        @csrf
                        <input type="text" name="message" required placeholder="Escreva uma resposta para o cliente..." autocomplete="off"
                            class="flex-1 bg-slate-900 border border-slate-700 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all placeholder-slate-600">
                        
                        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl transition-all shadow-lg shadow-blue-900/20 font-bold text-sm">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>

            {{-- Coluna Esquerda: Info do Cliente --}}
            <div class="lg:col-span-1 space-y-6 order-1 lg:order-2">
                <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6">
                    <h3 class="text-xs font-bold text-blue-500 uppercase tracking-widest mb-4">Dados do Cliente</h3>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-xl font-bold text-white border border-slate-700">
                            {{ substr($ticket->user->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-bold text-white">{{ $ticket->user->name }}</div>
                            <div class="text-xs text-slate-500">{{ $ticket->user->email }}</div>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm border-t border-slate-800 pt-4">
                        <div class="flex justify-between">
                            <span class="text-slate-500">ID do Cliente</span>
                            <span class="text-slate-300">#{{ $ticket->user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Conta criada em</span>
                            <span class="text-slate-300">{{ $ticket->user->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Sobre o Ticket</h3>
                     <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Prioridade</span>
                            <span class="text-white capitalize font-bold">{{ $ticket->priority }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Abertura</span>
                            <span class="text-slate-300">{{ $ticket->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Script de Polling Admin --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById('messages-container');
            const ticketId = "{{ $ticket->id }}";
            
            function scrollToBottom() {
                container.scrollTop = container.scrollHeight;
            }
            scrollToBottom();

            setInterval(() => {
                // Rota do Admin
                fetch(`/admin/chamados/${ticketId}/messages`)
                    .then(response => response.text())
                    .then(html => {
                        const isAtBottom = container.scrollHeight - container.scrollTop <= container.clientHeight + 100;
                        container.innerHTML = html;
                        if (isAtBottom) scrollToBottom();
                    });
            }, 3000);
        });
    </script>
</x-layouts.app>