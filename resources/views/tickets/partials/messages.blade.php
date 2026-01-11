{{-- Mensagem Inicial (Abertura) --}}
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
                <span class="text-[10px] font-bold {{ $msg->user_id === auth()->id() ? 'text-slate-400' : 'text-blue-400' }} uppercase">
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