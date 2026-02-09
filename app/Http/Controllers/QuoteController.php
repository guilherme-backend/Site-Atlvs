<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    // Lista apenas Orçamentos
    public function index()
    {
        $quotes = Ticket::where('user_id', Auth::id())
            ->where('category', 'orcamento')
            ->latest()
            ->paginate(10);

        return view('quotes.index', compact('quotes'));
    }

    // Formulário de Solicitação
    public function create()
    {
        return view('quotes.create');
    }

    // Salva a Solicitação
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'category' => 'orcamento', // Força a categoria
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'priority' => 'media',
            'status' => 'aberto',
        ]);

        return redirect()->route('quotes.show', $ticket)->with('success', 'Solicitação enviada com sucesso!');
    }

    // Visualiza a Negociação (Chat)
    public function show(Ticket $quote)
    {
        // Garante que é um orçamento e pertence ao usuário
        if ($quote->category !== 'orcamento' || $quote->user_id !== Auth::id()) {
            abort(404);
        }

        return view('quotes.show', compact('quote'));
    }
}