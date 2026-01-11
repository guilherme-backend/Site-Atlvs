{{-- Mensagem Inicial do Cliente --}}
<div class="flex justify-start">
    <div class="max-w-[85%]">
        <div class="flex items-center gap-2 mb-1">
            <span class="text-[10px] font-bold text-slate-300 uppercase">{{ $ticket->user->name }} (Cliente)</span>
            <span class="text-[10px] text-slate-600">{{ $ticket->created_at->format('H:i') }}</span>
        </div>
        <div class="bg-slate-800 text-slate-200 border border-slate-700 p-4 rounded-2xl rounded-tl-none shadow-md text-sm leading-relaxed">
            {{ $ticket->message }}
        </div>
    </div>
</div>

{{-- Loop --}}
@foreach($ticket->messages as $msg)
    <div class="flex {{ $msg->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
        <div class="max-w-[85%]">
            <div class="flex items-center gap-2 mb-1 {{ $msg->user_id === auth()->id() ? 'justify-end' : '' }}">
                <span class="text-[10px] font-bold {{ $msg->user_id === auth()->id() ? 'text-blue-400' : 'text-slate-300' }} uppercase">
                    {{ $msg->user_id === auth()->id() ? 'Suporte ATLVS (Você)' : $msg->user->name }}
                </span>
                <span class="text-[10px] text-slate-600">{{ $msg->created_at->format('d/m H:i') }}</span>
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