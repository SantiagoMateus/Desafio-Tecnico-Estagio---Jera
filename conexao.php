<?php
  $servidor = 'localhost';
  $usuario = 'root';
  $senha = '';
  $banco = 'usuarios';

  $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
  if (mysqli_connect_errno($conexao)){
    echo "Problemas para conectar no banco.";
    die();
  }
 ?>
