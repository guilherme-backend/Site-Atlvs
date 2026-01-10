<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f5; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header { border-bottom: 1px solid #e4e4e7; padding-bottom: 20px; margin-bottom: 20px; }
        .logo { color: #2563eb; font-weight: bold; font-size: 24px; text-decoration: none; }
        .message-box { background-color: #f8fafc; border-left: 4px solid #2563eb; padding: 15px; color: #334155; margin: 20px 0; font-style: italic; }
        .btn { display: inline-block; background-color: #2563eb; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 10px; }
        .footer { margin-top: 30px; font-size: 12px; color: #71717a; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="logo">ATLVS Tecnologia</span>
        </div>

        <p>Olá,</p>
        
        {{-- CORREÇÃO: Usamos $comment direto, sem o $this-> --}}
        <p>Você recebeu uma nova mensagem referente ao projeto <strong>{{ $comment->project->name }}</strong>.</p>

        <p><strong>{{ $comment->user->name }} escreveu:</strong></p>

        <div class="message-box">
            "{{ $comment->content }}"
        </div>

        <p>Para responder, acesse o painel do projeto:</p>

        <center>
            @if($comment->user->role === 'admin')
                <a href="{{ route('projects.show', $comment->project) }}" class="btn">Acessar Meu Projeto</a>
            @else
                <a href="{{ route('admin.projects.show', $comment->project) }}" class="btn">Responder no Admin</a>
            @endif
        </center>

        <div class="footer">
            © {{ date('Y') }} ATLVS Tecnologia. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>