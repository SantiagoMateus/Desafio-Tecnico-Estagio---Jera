<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="contatos.css" type="text/css">
  </head>
  <body>
    <h1>Tela de Cadastro</h1>
    <form action="verifica_cadastro.php" method="post">
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
        <label>
          Nome:
          <input type="text" name="nome">
        </label>
        <label>
          Data de nascimento:
          <input type="text" name="data">
        </label>
        <input type="submit" value="Enviar"/>
        <br>
      </fieldset>
    </form>
  </body>
</html>
