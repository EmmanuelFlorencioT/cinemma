<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Movie X</title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="index.php">
            <img src="./assets/logo-placeholder.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Cinemma
          </a>
          <!--Placeholder for the profile icon on the right-->
          <img src="./assets/logo-placeholder.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        </div>
    </nav>

    <div class="row movie-page">
      <div class="col-lg-4 left-section">
        <div class="poster-container"><img src="assets/movie-poster.jpg" alt="Movie Posters" class="movie-poster"></div>
      </div>

      <div class="col-lg-8 right-section">
        <h1>Movie A</h1>
        <p><span class="movie-attrib">Título Original: </span>Lorem ipsum.</p>

        <h2>Sinopsis</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus exercitationem enim aliquam, quidem iure eaque hic fugit eveniet possimus quisquam dolore dignissimos, deserunt laborum incidunt sequi facere blanditiis! Quidem, accusamus.</p>

        <p><span class="movie-attrib">Fecha de Estreno: </span>Lorem ipsum.</p>

        <div class="container-fluid movie-times">
          <button type="button" class="btn btn-outline-light">13:00</button>
          <button type="button" class="btn btn-outline-light">15:45</button>
        </div>

      </div>
    </div>
</body>
</html>