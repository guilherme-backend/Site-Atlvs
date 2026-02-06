<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Project;
use App\Models\ProjectComment;
use App\Mail\ProjectCommentMail;
use App\Events\ProjectMessageSent;

class ProjectCommentController extends Controller
{
    public function store(Request $request, Project $project)
    {
        // 1. Validação
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // 2. Criação do Comentário
        $comment = $project->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        broadcast(new ProjectMessageSent($comment))->toOthers();

        // === CORREÇÃO DE SEGURANÇA ===
        // Carrega os dados do Projeto e do Usuário para dentro da variável $comment
        // Isso evita o erro de "null" no envio do e-mail.
        $comment->load('project', 'user');

        // 3. Envio de Notificação por E-mail
        try {
            if (auth()->id() === $project->user_id) {
                // Se foi o Cliente que mandou, avisa a ATLVS
                Mail::to('contato@atlvs.com.br')->send(new ProjectCommentMail($comment));
            } else {
                // Se foi a ATLVS que mandou, avisa o Cliente
                Mail::to($project->user->email)->send(new ProjectCommentMail($comment));
            }
        } catch (\Exception $e) {
           
            // Silencia o erro de e-mail para não travar o chat
            // O chat funcionará mesmo se o e-mail falhar.
        }

        // 4. Redirecionamento
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.projects.show', $project)
                ->with('success', 'Mensagem enviada!');
        }

        return redirect()->route('projects.show', $project)
            ->with('success', 'Mensagem enviada!');
    }

    /**
     * Retorna apenas o HTML das mensagens para o AJAX atualizar
     */
    public function indexMessages(Project $project)
    {
        // Verifica se o usuário tem permissão para ver esse projeto
        if (auth()->user()->role !== 'admin' && $project->user_id !== auth()->id()) {
             abort(403);
        }

        return view('projects.partials.chat-messages', compact('project'));
    }
    
}