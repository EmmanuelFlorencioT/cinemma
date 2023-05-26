<?php
    require_once './search_movie.php';
    require_once './search_seats.php';
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
    <title>Seats - <?php echo $movie['original_title']; ?></title>
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
                <!--There is no action to be done with the account while in purchase-->
              </div>
          </div> 
        </div>
    </nav>

    <div class="top-section">
      <div class="top-content">
        <div class="left-cont">
          <img src="<?php echo "https://image.tmdb.org/t/p/w500".$movie['poster_path']; ?>" alt="Movie Poster" class="movie-poster">
        </div>
        <div class="right-cont">
          <h4><?php echo $movie['original_title']; ?></h4>
          <p id="time-label" data-time="<?php echo $_GET['time']; ?>"><span class="movie-attrib">Starting Time: </span> <?php echo $_GET['time']; ?></p>
          <!--'screening' is for the Screening_ID while 'screen' is what room will the movie will display-->
          <p id="screen-label" data-screen="<?php echo $_GET['screening']; ?>"><span class="movie-attrib">Screening: </span> <?php echo $_GET['screen']; ?></p>
          <p>
            <span class="movie-attrib">Number of Seats: </span>
            <button id="sub-seat">-</button>
            <span id="num-seats">0</span>
            <button id="add-seat">+</button>
          </p>
          <p><span class="movie-attrib">Price: </span> <span id="total-price"></span></p>
        </div>
      </div>
    </div>

    <div class="mid-section">
      <div class="seat-array">
        <div class="screen">screen</div>
        <?php 
          $rows = array("A", "B", "C", "D", "E");
          
          foreach($rows as $row){
            echo "<div class='seat-row'>";
              for($i = 1; $i < 7; $i++){
                $seat = $row.$i;
                if(in_array($seat, $occupiedSeats)){
                  echo "<div class='seat' id='" .$seat. "'><img src='./assets/armchair-off.png' alt='Ocuppied Seat'></div>";
                } else {
                  echo "<div class='seat' id='" .$seat. "' onclick=occupySeat(this)><img src='./assets/armchair.png' alt='Seat'><div class='seat-id-overlay'><p>" .$row.$i. "</p></div></div>";
                }
              }
            echo "</div>";
          }
        ?>
      </div>
      <div class="btn-container">
        <div class="btn" id="confirm-seats-btn">Purchase</button>
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

    <div style="display: none;" id="max-seats" data-max-seats="<?php echo 30 - count($occupiedSeats); ?>"></div>

    <script src="./seats.js"></script>
</body>
</html>