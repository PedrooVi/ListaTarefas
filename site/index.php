<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url('imgs/Background.jpg'); background-size: cover;">


  <div class="container">
    <h1>Faça login</h1>
    <?php
      require_once('src/loginbd.php'); //Chama o codigo sem redirecionar
    ?>  
    <form method="POST">
      <div class="inputs">
        <label for="email">Email ou Telefone</label>
        <input id="login" name="acesso" type="text"/>
      </div>

      <div class="inputs">
        <label for="password">Senha</label>
        <input id="senha" name="password" type="password"/>
      </div>

      <div class="checkbox">
        <input type="checkbox" id="check" />
        <label id="label-check" for="check">Mostar senha</label>
      </div>
        
      <button type="submit" class="btn">Login</button>
        
      <p class="text">
        Não possui conta?
        <a id="btn-registrar" href="pags/registro.php">Registre-se</a>
      </p>
    </form>
  </div>
</body>
<script src="src\script_login.js"></script>
</html>