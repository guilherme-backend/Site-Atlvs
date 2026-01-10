<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ProjectComment;

class ProjectCommentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Variável pública para que a View do email consiga acessar os dados.
     */
    public $comment;

    /**
     * Create a new message instance.
     * Aqui recebemos o comentário quando criamos o email: new ProjectCommentMail($comentario)
     */
    public function __construct(ProjectComment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     * Define o Assunto do E-mail dinamicamente.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[ATLVS] Nova mensagem no projeto: ' . $this->comment->project->name,
        );
    }

    /**
     * Get the message content definition.
     * Aponta para o arquivo HTML que desenhamos (resources/views/emails/project_comment.blade.php)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.project_comment',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}