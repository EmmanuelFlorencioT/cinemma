<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cinemma Log In</title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="index.php">
            <img src="./assets/mocklogo-cinemma.png" alt="Logo" width="28" height="28" class="d-inline-block align-text-top">
            <span id="nav-cinemma">Cinemma</span>
          </a>

          <div class="dropdown">
            <button class="dropbtn">
              <img src="./assets/profile.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </button>
              <div class="dropdown-content">
                <a href="./signup.php">Sign Up</a>
              </div>
          </div> 
        </div>
    </nav>

    <div class="login-form">
        <form id="loginForm" action="./auth_cinemma.php" method="POST">
            <h2>Log In</h2>
            <hr>    
            <label for="mail">Email:</label><br>
            <input type="email" name="mail" id="mail" required><br><br>
            <label for="psswd">Password:</label><br>
            <input type="password" name="psswd" id="psswd" required><br>
            <div class="btn-container">
                <button class="btn" type="submit">Log In</button>
            </div>
        </form>
    </div>

    <div class="modal-container no-click" id="modalContainer">
        <div class="modal-content no-click" id="modalContent">
            <h3>Error with login</h3>
            <p>Please enter your credentials correctly.</p>
            <div>
                <button type="button" class="btn" id="close">Close</button>
            </div>
        </div>
    </div>

    <script src="./login.js"></script>
    
</body>
</html>