<!DOCTYPE html>
<html>
<head>
    <title>Novo Contato - ATLVS</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2 style="color: #0044cc;">Novo Lead do Site ATLVS</h2>
    
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Empresa:</strong> {{ $data['company'] ?? 'Não informado' }}</p>
    <p><strong>E-mail:</strong> {{ $data['email'] }}</p>
    
    <br>
    <p><strong>Mensagem:</strong></p>
    <div style="background-color: #f4f4f4; padding: 15px; border-radius: 5px;">
        {{ $data['message'] }}
    </div>
</body>
</html>