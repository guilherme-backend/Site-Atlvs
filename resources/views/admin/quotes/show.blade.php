<x-layouts.app>
    <div class="h-[calc(100vh-100px)] flex flex-col max-w-6xl mx-auto">
        
        {{-- HEADER DA NEGOCIAÇÃO --}}
        <div class="bg-slate-900 border border-slate-800 rounded-t-2xl p-6 flex justify-between items-center shrink-0">
            <div>
                <div class="flex items-center gap-3">
                    <h1 class="text-2xl font-bold text-white">Orçamento #{{ $quote->id }}</h1>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-blue-500/10 text-blue-400 border border-blue-500/20">
                        {{ $quote->status }}
                    </span>
                </div>
                <p class="text-slate-400 text-sm mt-1">
                    Cliente: <span class="text-white font-medium">{{ $quote->user->name }}</span>
                </p>
                <p class="text-slate-500 text-xs mt-0.5">Assunto: {{ $quote->subject }}</p>
            </div>

            {{-- BOTÃO DE AÇÃO (VINCULAR PROJETO) --}}
            <div>
                {{-- Só mostra o botão se ainda não virou projeto (status 'fechado' ou 'concluido' esconde) --}}
                @if($quote->status !== 'fechado')
                    <form action="{{ route('admin.projects.create') }}" method="GET">
                        <input type="hidden" name="user_id" value="{{ $quote->user->id }}">
                        <input type="hidden" name="name" value="{{ $quote->subject }}">
                        
                        <button type="submit" class="group flex items-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-emerald-900/20 transition-all hover:-translate-y-0.5">
                            <div class="p-1 bg-white/20 rounded-lg group-hover:bg-white/30 transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Aprovar & Criar Projeto</span>
                        </button>
                    </form>
                @else
                    <div class="flex items-center gap-2 text-emerald-500 bg-emerald-500/10 px-4 py-2 rounded-xl border border-emerald-500/20 font-bold">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Projeto Criado</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- ÁREA DO CHAT --}}
        <div class="flex-1 bg-slate-900/50 border-x border-slate-800 relative flex flex-col overflow-hidden">
            
            {{-- Descrição Original do Cliente (Fixo no Topo) --}}
            <div class="bg-slate-950/50 p-4 border-b border-slate-800 text-sm text-slate-400">
                <strong class="text-blue-400 block text-xs uppercase tracking-wider mb-1">Solicitação Inicial:</strong>
                {{ $quote->message }}
            </div>

            {{-- Lista de Mensagens --}}
            <div id="messages-container" class="flex-1 overflow-y-auto p-6 space-y-6 scrollbar-thin scrollbar-thumb-slate-700">
                {{-- Reutilizando o layout de mensagens de tickets --}}
                @include('admin.tickets.partials.messages', ['ticket' => $quote])
            </div>
        </div>

        {{-- FORMULÁRIO DE ENVIO --}}
        <div class="bg-slate-900 border border-slate-800 rounded-b-2xl p-4">
            <form action="{{ route('admin.tickets.reply', $quote) }}" method="POST" class="flex gap-4">
                @csrf
                <input type="text" name="message" required placeholder="Digite sua proposta ou negocie o valor..." 
                    class="flex-1 bg-slate-950 border border-slate-700 rounded-xl px-4 py-3 text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-xl font-bold transition-colors flex items-center gap-2">
                    <span>Enviar</span>
                    <svg class="w-4 h-4 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9-2-9-18-9 18 9 2zm0 0v-8"/></svg>
                </button>
            </form>
        </div>

    </div>
    
    <script>
        // Rolar para o final do chat ao carregar
        const chatContainer = document.getElementById('messages-container');
        if(chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight;
    </script>
</x-layouts.app>