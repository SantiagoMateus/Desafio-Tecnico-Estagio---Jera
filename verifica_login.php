<?php
  include "conexao.php";

  $username = $_POST["login"];
  $senha = $_POST["senha"];

  $Busca = "SELECT * FROM usuarios where username = '$username'";
  $resultado = mysqli_query($conexao, $Busca);

  $linhas = mysqli_num_rows($resultado);

  if($linhas == 0){
    echo "<html><body>";
    echo "<p align=\"center\">Usuario não encontrado!</p>";
    echo "<p align=\"center\"><a href=\"login.php\">Voltar</a>/p>";
    echo "</body></html>";
  }
  else{
    $user = mysqli_fetch_assoc($resultado);
    if ($user['senha'] != $senha) {
      echo "<html><body>";
      echo "<p align=\"center\">A senha está incorreta</p>";
      echo "<p align=\"center\"><a href=\"login.php\">Voltar</a>/p>";
      echo "</body></html>";
    }
    else {
      setcookie("nome_usuario", $username);
      setcookie("senha_usuario", $senha);
      header("Location: pagina_inicial.php");
    }
  }
 ?>
