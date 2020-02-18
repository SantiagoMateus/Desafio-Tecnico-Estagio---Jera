<?php
session_start();
echo "<p>Lista para assistir:</p>";
for ($i = 0; $i < count($_SESSION['escolhass']); $i++) {
  echo $_SESSION['escolhass'];
  echo "<br>";
}

?>
