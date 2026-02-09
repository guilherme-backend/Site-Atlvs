<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    // Lista APENAS Orçamentos
    public function index()
    {
        $quotes = Ticket::where('category', 'orcamento')
            ->with('user')
            ->latest()
            ->paginate(15);

        return view('admin.quotes.index', compact('quotes'));
    }

    // Mostra o Chat do Orçamento
    public function show(Ticket $quote)
    {
        // Segurança: Garante que é orçamento
        if ($quote->category !== 'orcamento') {
            return redirect()->route('admin.tickets.show', $quote);
        }

        // Carrega mensagens
        $quote->load(['messages.user', 'user']);

        return view('admin.quotes.show', compact('quote'));
    }
}