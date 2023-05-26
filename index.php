<?php
  require "./connect_tmdb.php";
  require "./session.php";

  $movies = json_decode($respMovies, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cinemma</title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="#">
            <img src="./assets/mocklogo-cinemma.png" alt="Logo" width="28" height="28" class="d-inline-block align-text-top">
            <span id="nav-cinemma">Cinemma</span>
          </a>
          <!--Placeholder for the profile icon on the right-->
          <div class="dropdown">
            <button class="dropbtn">
              <img src="./assets/profile.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </button>
              <div class="dropdown-content">
                <?php
                  if(isLoggedIn()){
                    echo "<a href='./update-profile.php'>Account</a>
                          <a href='./logout.php'>Log Out</a>";
                  } else {
                    echo "<a href='./login.php'>Log In</a>
                          <a href='./signup.php'>Sign Up</a>";
                  }
                ?>
              </div>
          </div> 
        </div>
    </nav>

    <div class="container-fluid flex-column movie-overview pt-4">
        <div class="container latest-movie">
          Latest Movie
        </div>

        <div class="row mt-4 movie-list text-center">
          <?php
            foreach($movies["results"] as $movieItem){
              echo "<div class='col-md-3 col-sm-4'>
                  <a href='./movie.php?id=".$movieItem['id']."'>
                    <div class='movie'>
                    <img class='movie-poster' src='https://image.tmdb.org/t/p/w500".$movieItem['poster_path']."' alt='".$movieItem['original_title']."'>
                    </div>
                  </a>
                </div>";
            }
          ?>
            
        </div>

    </div>

    <footer>
      <div class="container disclaimer">
        <a href="https://www.themoviedb.org">
          <img src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_long_2-9665a76b1ae401a510ec1e0ca40ddcb3b0cfe45f1d51b77a308fea0845885648.svg" alt="The Movie Database Logo">
        </a>
        <p>This product uses the TMDB API but is not endorsed or certified by TMDB.</p>
      </div>  

    </footer>
    
</body>
</html>