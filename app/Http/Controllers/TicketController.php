<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // 1. Listar Meus Chamados
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('tickets.index', compact('tickets'));
    }

    // 2. Tela de Abrir Novo Chamado
    public function create()
    {
        return view('tickets.create');
    }

    // 3. Salvar o Chamado no Banco
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'priority' => 'required|in:baixa,media,alta',
            'message' => 'required|string',
        ]);

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $validated['subject'],
            'priority' => $validated['priority'],
            'message' => $validated['message'],
            'status' => 'aberto',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Chamado aberto com sucesso! Nossa equipe responderá em breve.');
    }

    // 4. Ver Detalhes do Chamado (Faremos o chat depois)
    public function show(Ticket $ticket)
    {
        // Garante que o usuário só veja os próprios chamados
        if ($ticket->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tickets.show', compact('ticket'));
    }

    // 5. Enviar Resposta (Chat)
    public function reply(Request $request, Ticket $ticket)
    {
        // Segurança: só dono ou admin pode responder
        if ($ticket->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate(['message' => 'required|string']);

        TicketMessage::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        // Se foi o admin respondendo, muda status para 'respondido'
        // Se foi o cliente, muda para 'aberto' (pendente de análise)
        $ticket->update([
            'status' => Auth::user()->role === 'admin' ? 'respondido' : 'aberto'
        ]);

        return back()->with('success', 'Mensagem enviada!');
    }
}