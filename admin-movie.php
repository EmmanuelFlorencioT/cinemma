<?php
  require_once './search_movie.php';
  require_once './search_screenings.php';
  require "./session.php";

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
    <title>Admin - <?php echo $movie['original_title']; ?></title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="admin-index.php">
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
                    echo "<a href='./logout.php'>Log Out</a>";
                  } else {
                    echo "<a href='./login.php'>Log In</a>
                          <a href='./signup.php'>Sign Up</a>";
                  }
                ?>
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
          <h3><?php echo $movie['original_title']; ?></h3>
          <h4>Movie ID: <?php echo $movie['id'] ?></h4>

          <form class="mt-4" action="./insert_screening.php?id=<?php echo $movie['id'] ?>" method="POST">
            <h5>Add a Screening</h5>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <label for="">Starting time:</label>
                <input type="text" name="time" id="start-time" required>
              </div>

              <div class="col-md-6">
                <label for="">Theatre Number:</label>
                <input type="text" name="theatre" id="theatre-num" required>
              </div>
            </div>

            <div class="btn-screening">
              <button class="btn" type="submit">Submit Screening</button>
            </div>
          </form>

          <div class="container-fluid movie-times mt-3">
            <h5>Remove a Screening</h5>
            <hr>
            <?php 
              foreach($screenings as $func){
                echo "<div class='btn' onclick=selectTime(this)><p data-screen='".$func['screening_id']."'>".$func['start_time']."</p></div>";
              }
            ?>
          </div>

          <div class="btn-screening">
            <button class="btn" onclick=removeTime()>Remove Screening</button>
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

    <script src="./admin-movie.js"></script>

</body>
</html>