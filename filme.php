<?php
include "pagina_inicial.php";

  $filme = $_POST["filme"];
  $escolhas = array();

  $movies = $tmdb->searchMovie($filme);
   $x = 1;

  echo '  <div class="panel panel-default">
              <div class="panel-body">
                  <ul>';

  foreach($movies as $movie){
      echo '<li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
  }

  echo '          </ul>
              </div>
          </div>';
  ?>

<?php
//if (isset($_POST['watchlist']) == $movie->getID()) {
//      $escolhas[] = $movie->getTitle();
//}
?>

<?php

//for ($i = 0; $i < count($escolhas); $i++) {
//	echo $escolhas[$i];
//  echo "<br>";
//}

?>
