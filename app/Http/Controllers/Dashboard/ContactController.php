<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Ordena por não lidos primeiro, depois pela data
        $contacts = Contact::orderBy('is_read', 'asc')
                          ->latest()
                          ->paginate(10);

        return view('dashboard.contacts.index', compact('contacts'));
    }

    public function toggleRead(Contact $contact)
    {
        // Inverte o status (se tá lido vira não lido, e vice-versa)
        $contact->update([
            'is_read' => !$contact->is_read
        ]);

        $status = $contact->is_read ? 'lida' : 'como não lida';
        return back()->with('success', "Mensagem marcada {$status}.");
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Mensagem excluída com sucesso.');
    }

    // ... métodos index, toggleRead e destroy existentes ...

    public function show(Contact $contact)
    {
        // Se a mensagem ainda não foi lida, marca como lida ao abrir
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('dashboard.contacts.show', compact('contact'));
    }

}