<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Código de Autenticação</h1>

    <p>Olá <strong>{{ $user->name }}</strong>, aqui está o seu código de acesso para o Do That:</p>

    <span style="display:flex;background-color: lightblue; width:250px;">
        <h2>
            {{ $code }}
        </h2>
    </span>

    <small>Não compartilhe este código com ninguém!</small>
</body>

</html>
