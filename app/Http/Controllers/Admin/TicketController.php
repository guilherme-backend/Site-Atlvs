<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // 1. Listar TODOS os chamados
    public function index()
    {
        // Traz chamados com o usuário dono, ordenado pelos mais recentes
        $tickets = Ticket::with('user')->latest()->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    // 2. Ver o chamado (Chat)
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    // 3. Responder (Admin)
    public function reply(Request $request, Ticket $ticket)
    {
        $request->validate(['message' => 'required|string']);

        // Salva a mensagem do Admin
        $message = TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        // Muda status para 'Respondido' automaticamente e atualiza data
        $ticket->update([
            'status' => 'respondido',
            'updated_at' => now()
        ]);

        return back()->with('success', 'Resposta enviada com sucesso!');
    }

    // 4. Mudar Status Manualmente (ex: Fechar chamado)
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate(['status' => 'required|in:aberto,respondido,resolvido']);
        
        $ticket->update(['status' => $request->status]);

        return back()->with('success', 'Status atualizado!');
    }

    // 5. Polling de Mensagens (Admin)
    public function indexMessages(Ticket $ticket)
    {
        // Retorna a view parcial (vamos criar uma específica para admin se quiser diferenciar cores, ou usar a mesma com lógica)
        return view('admin.tickets.partials.messages', compact('ticket'));
    }
}