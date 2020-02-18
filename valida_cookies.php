<?php
  if (isset($_COOKIE["nome_usuario"])) {
    $nome_usuario = $_COOKIE["nome_usuario"];
  }
  if (isset($_COOKIE["senha_usuario"])) {
    $senha_usuario = $_COOKIE["senha_usuario"];
  }
  if (!(empty($nome_usuario) OR empty($senha_usuario))) {
    include "conexao.php";
    $sql = "select * from usuarios where username='$nome_usuario'";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
      $user = mysqli_fetch_assoc($resultado);
      if ($user['senha'] != $senha_usuario) {
        setcookie("nome_usuario");
        setcookie("senha_usuario");
        echo "<html><h1>CADE O LOGIN, TU NÃO EFETUOU! 1</h1></html>";
        exit;
      }
    }else{
      setcookie("nome_usuario");
      setcookie("senha_usuario");
      echo "<html><h1>CADE O LOGIN, TU NÃO EFETUOU! 2</h1></html>";
      exit;
    }
  }
  else{
    echo "<html><h1>CADE O LOGIN, TU NÃO EFETUOU! 3</h1></html>";
    exit;
  }
 ?>
