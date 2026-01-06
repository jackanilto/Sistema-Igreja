<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel - {{ $church->name }}</title>
</head>
<body>

<h1>Painel da Igreja</h1>

<p><strong>Igreja:</strong> {{ $church->name }}</p>
<p><strong>Subdomínio:</strong> {{ $church->subdomain }}</p>
<p><strong>Usuário:</strong> {{ auth()->user()->email }}</p>

<hr>

<p>Bem-vindo ao sistema Adonai SaaS 🚀</p>

</body>
</html>
