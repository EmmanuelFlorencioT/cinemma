<?php
  require_once './search_movie.php';

  $movie = json_decode($movieInfo, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cinemma - <?php echo $movie['original_title']; ?></title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="index.php">
            <img src="./assets/mocklogo-cinemma.png" alt="Logo" width="28" height="28" class="d-inline-block align-text-top">
            <span id="nav-cinemma">Cinemma</span>
          </a>
          <!--Placeholder for the profile icon on the right-->
          <div class="dropdown">
            <button class="dropbtn">
              <img src="./assets/profile.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </button>
              <div class="dropdown-content">
                <a href="#">Log In</a>
                <a href="./signup.php">Sign Up</a>
              </div>
          </div> 
        </div>
    </nav>

    <div>
      <div class="row movie-page">
        <div class="col-lg-4 left-section">
          <div class="poster-container"><img src="<?php echo "https://image.tmdb.org/t/p/w500".$movie['poster_path']; ?>" alt="Movie Posters" class="movie-poster"></div>
        </div>
  
        <div class="col-lg-8 right-section">
          <h1><?php echo $movie['original_title']; ?></h1>
          <h4><?php echo "\"".$movie['tagline']."\""; ?></h4>
          <div class="genres">
            <?php 
              foreach($movie['genres'] as $genre){
                echo "<div class='movie-genre'> ".$genre['name']." </div>";
              }
            ?>
          </div>
  
          <p class="overview-title">Overview</p>
          <p><?php echo $movie['overview']; ?></p>
  
          <p>
            <span class="movie-attrib">Release Date: </span>
            <?php 
              $date = date_create($movie['release_date']);
              echo date_format($date, 'd M Y'); 
            ?>
          </p>
          <p><span class="movie-attrib">Duration: </span><?php echo $movie['runtime']; ?> mins</p>
  
          <div class="container-fluid movie-times">
            <button type="button" class="btn btn-outline-light">13:00</button>
            <button type="button" class="btn btn-outline-light">15:45</button>
          </div>
  
        </div>
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