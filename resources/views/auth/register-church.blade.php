<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro da Igreja</title>
</head>
<body>

<h2>Cadastro da Igreja</h2>

<form method="POST" action="{{ route('church.register') }}">
    @csrf

    <input type="text" name="name" placeholder="Nome da Igreja" required><br><br>

    <input type="text" name="subdomain" placeholder="Subdomínio (ex: adonai)" required><br><br>

    <input type="email" name="email" placeholder="E-mail" required><br><br>

    <input type="password" name="password" placeholder="Senha" required><br><br>

    <input type="password" name="password_confirmation" placeholder="Confirmar Senha" required><br><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
