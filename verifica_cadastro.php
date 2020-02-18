<?php
  include "conexao.php";

  $usuario = mysqli_real_escape_string($conexao, trim($_POST['login']));
  $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $data = mysqli_real_escape_string($conexao, trim($_POST['data']));

  $sql = "INSERT INTO usuarios (username, senha, nome, email) VALUES ('$usuario', '$senha', '$nome', '$data')";
  $Busca = "SELECT * FROM usuarios where username = '$username'";
  $resultado = mysqli_query($conexao, $Busca);

  $linhas = mysqli_num_rows($resultado);

  if($linhas == 0){
    echo "<html><body>";
    echo "<p align=\"center\">Insira as informações!</p>";
    echo "<p align=\"center\"><a href=\"login.php\">Voltar</a>";
    echo "</body></html>";
  }

  if($conexao->query($sql) === TRUE) {
    echo "<html><body>";
    echo "<p align=\"center\">Sucesso!</p>";
    echo "<p align=\"center\"><a href=\"login.php\">Voltar</a>";
    echo "</body></html>";
  }

  $conexao->close();

  header('Location: index.php');
  exit;
 ?>
