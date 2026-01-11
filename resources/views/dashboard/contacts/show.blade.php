<x-layouts.app>
    <div class="max-w-4xl mx-auto">
        
        {{-- Cabeçalho com Voltar --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <a href="{{ route('admin.leads') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-white mb-2 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Voltar para Leads
                </a>
                <h1 class="text-3xl font-bold text-white">Detalhes da Mensagem</h1>
            </div>
            
            {{-- Botão de Excluir (Canto superior) --}}
            <form action="{{ route('admin.leads.destroy', $contact) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-400 hover:text-red-300 hover:bg-red-500/10 px-4 py-2 rounded-lg transition-colors text-sm font-bold flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Excluir Lead
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            {{-- Coluna da Esquerda: Dados do Remetente --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-slate-900/50 border border-slate-800 rounded-2xl p-6">
                    <h3 class="text-xs font-bold text-blue-500 uppercase tracking-widest mb-4">Remetente</h3>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-xl font-bold text-white border border-slate-700">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                        <div>
                            <div class="font-bold text-white">{{ $contact->name }}</div>
                            <div class="text-xs text-slate-500">Lead do Site</div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="text-xs text-slate-500 block mb-1">E-mail</label>
                            <a href="mailto:{{ $contact->email }}" class="text-blue-400 hover:text-blue-300 text-sm break-all flex items-center gap-2">
                                {{ $contact->email }}
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                        
                        @if($contact->phone)
                        <div>
                            <label class="text-xs text-slate-500 block mb-1">Telefone</label>
                            <a href="https://wa.me/55{{ preg_replace('/\D/', '', $contact->phone) }}" target="_blank" class="text-white text-sm hover:text-emerald-400 transition-colors flex items-center gap-2">
                                {{ $contact->phone }}
                                <span class="text-[10px] bg-emerald-500/10 text-emerald-500 px-1.5 py-0.5 rounded border border-emerald-500/20">WhatsApp</span>
                            </a>
                        </div>
                        @endif

                        <div>
                            <label class="text-xs text-slate-500 block mb-1">Recebido em</label>
                            <p class="text-slate-300 text-sm">{{ $contact->created_at->format('d/m/Y \à\s H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Coluna da Direita: Mensagem --}}
            <div class="lg:col-span-2">
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 min-h-[300px]">
                    <h3 class="text-lg font-bold text-white mb-2">{{ $contact->subject }}</h3>
                    <div class="h-px w-full bg-slate-800 mb-6"></div>
                    
                    <div class="prose prose-invert prose-slate max-w-none text-slate-300 leading-relaxed whitespace-pre-wrap font-light">
{{ $contact->message }}
                    </div>
                </div>

                {{-- Botão de Responder Rápido --}}
                <div class="mt-6 text-right">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-blue-900/20 transition-all transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                        Responder por E-mail
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>