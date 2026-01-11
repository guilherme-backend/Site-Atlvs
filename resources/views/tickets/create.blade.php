<x-layouts.app>
    <div class="max-w-3xl mx-auto">
        
        {{-- Cabeçalho com Botão Voltar --}}
        <div class="mb-8">
            <a href="{{ route('tickets.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-white mb-4 transition-colors font-medium">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Voltar para Meus Chamados
            </a>
            <h1 class="text-3xl font-bold text-white mb-2">Abrir Novo Chamado</h1>
            <p class="text-slate-400">Descreva seu problema ou solicitação detalhadamente para que possamos ajudar.</p>
        </div>

        {{-- Card do Formulário --}}
        <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-8 backdrop-blur-sm shadow-xl">
            <form action="{{ route('tickets.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- Campo Assunto --}}
                <div>
                    <label for="subject" class="block text-sm font-bold text-slate-300 mb-2">Assunto</label>
                    <input type="text" name="subject" id="subject" required placeholder="Ex: Erro ao acessar o relatório financeiro"
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all">
                </div>

                {{-- Campo Prioridade --}}
                <div>
                    <label for="priority" class="block text-sm font-bold text-slate-300 mb-2">Prioridade</label>
                    <div class="relative">
                        <select name="priority" id="priority" required
                            class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all appearance-none cursor-pointer">
                            <option value="baixa">Baixa (Dúvidas ou Sugestões)</option>
                            <option value="media" selected>Média (Problemas Funcionais)</option>
                            <option value="alta">Alta (Sistema Indisponível/Crítico)</option>
                        </select>
                        {{-- Ícone da seta do select customizado --}}
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-500">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </div>

                {{-- Campo Mensagem --}}
                <div>
                    <label for="message" class="block text-sm font-bold text-slate-300 mb-2">Descrição Detalhada</label>
                    <textarea name="message" id="message" rows="6" required placeholder="Explique o que aconteceu, passos para reproduzir o erro, etc..."
                        class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-white placeholder-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all resize-none"></textarea>
                </div>

                {{-- Botões de Ação --}}
                <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-4">
                    <a href="{{ route('tickets.index') }}" class="text-slate-400 hover:text-white text-sm font-medium transition-colors">Cancelar</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-blue-900/20 transition-all transform hover:-translate-y-0.5">
                        Enviar Solicitação
                    </button>
                </div>
            </form>
        </div>
        
        {{-- Dica Lateral --}}
        <div class="mt-8 bg-blue-900/10 border border-blue-500/20 rounded-xl p-4 flex gap-4 items-start">
            <div class="text-blue-400 mt-1">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <h4 class="text-blue-100 font-bold text-sm mb-1">Dica da Equipe de Suporte</h4>
                <p class="text-blue-300/70 text-xs leading-relaxed">
                    Quanto mais detalhes você fornecer (mensagens de erro exatas, navegador usado), mais rápido conseguiremos resolver seu problema. Se for algo crítico que parou sua operação, selecione a prioridade "Alta".
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>