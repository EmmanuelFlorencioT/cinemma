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

    <div class="top-section">

    </div>

    <div class="seat-array">
      <div class="screen">screen</div>
      <?php 
        $rows = array("A", "B", "C", "D", "E", "F");
        
        foreach($rows as $row){
          echo "<div class='seat-row'>";
            for($i = 1; $i < 7; $i++){
              echo "<div class='seat' id='" .$row.$i. "'><p class='seat-label'>" .$row.$i. "</p></div>";
            }
          echo "</div>";
        }
      ?>
    </div>
</body>
</html>