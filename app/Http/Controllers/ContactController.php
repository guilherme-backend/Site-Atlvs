<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validar os dados
        $validated = $request->validate([
            'name' => 'required|min:3',
            'company' => 'nullable|string',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // 2. Enviar o e-mail para VOCÊ (admin)
        // Substitua pelo seu e-mail real onde quer receber os contatos
        Mail::to('contato@atlvs.com.br')->send(new ContactFormMail($validated));

        // 3. Redirecionar de volta com mensagem de sucesso
        return back()->with('success', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
    }
}