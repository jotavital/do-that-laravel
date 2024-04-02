<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: "Poppins", sans-serif;
            text-align: center;
        }

        .code-box {
            display: flex;
            justify-content: center;

            h2 {
                background-color: lightgray;
                width: 20%;
                border-radius: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <h1>Código de Autenticação</h1>

    <p>Olá <strong>{{ $user->name }}</strong>, aqui está o seu código de acesso para o Do That:</p>

    <div class="code-box">
        <h2>
            {{ $code }}
        </h2>
    </div>

    <small>Não compartilhe este código com ninguém!</small>
</body>

</html>
