<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background-image: url('../imgs/Background.jpg'); background-size: cover;">

    <div class="container">
        <h1>Cadastro</h1>
        <form method="post" action="../src/registrobd.php" onsubmit="return verificarCredenciais()">
            <div class="inputs">
            <label for="nome">Nome completo</label>
            <input id="nome" name="nome" type="text"/>
            </div>

            <div class="inputs">
            <label for="register-email">Email</label>
            <input id="register-email" name="register-email" type="text"/>
            </div>

            <div class="inputs">
            <label for="telefone">Telefone</label>
            <input id="telefone" name="telefone" type="text"/>
            </div>

            <div class="inputs">
            <label for="password-register">Senha</label>
            <input id="password-register" name="password-register" type="password"/>
            </div>

            <div class="inputs">
            <label for="password-confirm">Confirmar senha</label>
            <input id="password-confirm" name="password-confirm" type="password"/>
            </div>

            <div class="checkbox">
            <input type="checkbox" id="check" />
            <label id="label-check" for="check">Mostar senha</label>
            </div>

            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
</body>
<script src="..\src\script_registro.js"></script>
</html>