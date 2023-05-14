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
            <img src="./assets/logo-placeholder.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Cinemma
          </a>
          <form class="d-flex mx-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
          <!--Placeholder for the profile icon on the right-->
          <img src="./assets/logo-placeholder.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        </div>
    </nav>

    <div class="container-fluid flex-column movie-overview pt-4">
        <div class="container latest-movie">
            Latest Movie
        </div>

        <div class="row mt-4 movie-list text-center">
            <div class="col-md-3 col-sm-4"><div class="movie"><a href="movie.php">Movie A</a></div></div>
            <div class="col-md-3 col-sm-4"><div class="movie">Movie B</div></div>
            <div class="col-md-3 col-sm-4"><div class="movie">Movie C</div></div>
            <div class="col-md-3 col-sm-4"><div class="movie">Movie D</div></div>
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