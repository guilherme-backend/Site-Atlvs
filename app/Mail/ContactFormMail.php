<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    // Recebe os dados do formulário
    public function __construct($data)
    {
        $this->data = $data;
    }

    // Define o assunto do e-mail
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Novo Contato pelo Site ATLVS: ' . $this->data['name'],
        );
    }

    // Define qual arquivo HTML será o corpo do e-mail
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // Vamos criar essa view no próximo passo
        );
    }

    public function attachments(): array
    {
        return [];
    }
}