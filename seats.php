<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Seats</title>
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

    </div>

    <div class="mid-section">
      <div class="seat-array">
        <div class="screen">screen</div>
        <?php 
          $rows = array("A", "B", "C", "D", "E");
          
          foreach($rows as $row){
            echo "<div class='seat-row'>";
              for($i = 1; $i < 7; $i++){
                echo "<div class='seat' id='" .$row.$i. "' onclick=occupySeat(this)><img src='./assets/armchair.png' alt='Seat'><div class='seat-id-overlay'><p>" .$row.$i. "</p></div></div>";
              }
            echo "</div>";
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

    <script src="./seats.js"></script>
</body>
</html>