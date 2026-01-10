{{-- resources/views/projects/partials/chat-messages.blade.php --}}

@forelse($project->comments->sortBy('created_at') as $comment)
    <div class="max-w-[85%] {{ $comment->user_id === auth()->id() ? 'self-end' : 'self-start' }}">
        <div class="flex items-center gap-2 mb-1 {{ $comment->user_id === auth()->id() ? 'justify-end' : '' }}">
            <span class="text-[10px] font-bold text-zinc-500 uppercase">
                {{ $comment->user->id === auth()->id() ? 'Você' : $comment->user->name }}
            </span>
            <span class="text-[10px] text-zinc-600">{{ $comment->created_at->format('H:i') }}</span>
        </div>
        <div class="p-3.5 rounded-2xl text-sm shadow-sm {{ $comment->user_id === auth()->id() ? 'bg-blue-600 text-white rounded-tr-none' : 'bg-zinc-800 text-zinc-300 rounded-tl-none border border-zinc-700' }}">
            {{ $comment->content }}
        </div>
    </div>
@empty
    <div class="flex flex-col items-center justify-center h-full text-center space-y-3 py-10">
        <svg class="w-12 h-12 text-zinc-800" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        <p class="text-zinc-600 text-sm font-medium">Tem alguma dúvida? Mande uma mensagem.</p>
    </div>
@endforelse