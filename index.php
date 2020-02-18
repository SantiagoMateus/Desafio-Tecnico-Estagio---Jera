<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="contatos.css" type="text/css">
  </head>
  <body>
    <h1>Tela de Login</h1>
    <form action="verifica_login.php" method="post">
      <fieldset>
        <legend>Insira seus dados</legend>
        <label>
          Nome do usuario:
          <input type="text" name="login">
        </label>
        <label>
          Senha:
          <input type="password" name="senha">
        </label>
        <input type="submit" value="Enviar"/>
        <br>
        <button onclick="location.href='cadastro.php'" type="button">Cadastrar Login</button>
      </fieldset>
    </form>
  </body>
</html>
