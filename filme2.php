<?php
session_start();

if (! isset($_SESSION['escolhas']))
   $_SESSION['escolhas'] = array();

include "filmelistar.php";
$filme2 = $_POST["filme2"];

$movie = $tmdb->getMovie($filme2);
// returns a Movie Object

$_SESSION['escolhas'][] = $movie->getTitle();

echo '  <div class="panel panel-default">
            <div class="panel-body">
            <br>
                Adicionado a lista!
                <ul>';
echo $movie->getTitle();

echo '          </ul>
            </div>
        </div>';

        echo "<p>Lista para assistir:</p>";
        for ($i = 0; $i < count($_SESSION['escolhas']); $i++) {
          echo $_SESSION['escolhas'][$i];
          echo "<br>";
        }
 


//        for ($i = 0; $i < count($_SESSION['escolhass']); $i++) {
//        	echo $_SESSION['escolhass'];
//          echo "<br>";
//        }
/*




  echo '  <div class="panel panel-default">
              <div class="panel-body">
                  Adicionado a lista!
                  <ul>';
  foreach($movies as $movie){
      echo '          <li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
      //Inserir no vetor
      $escolhas[] = $movie->getTitle();
  }
  echo '          </ul>
              </div>
          </div>';

for ($i = 0; $i < count($escolhas); $i++) {
	echo $escolhas[$i];
  echo "<br>";
*/
//}
//DEPOIS MOSTRAR NO VETOR




 ?>
