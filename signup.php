<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cinemma Sign Up</title>
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
                <a href="./login.php">Log In</a>
              </div>
          </div> 
        </div>
    </nav>

    <div class="signup-form">
        <form action="./insert_user.php" method="POST">
            <h2>Personal Information</h2>
            <hr>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" required><br>
                    <label for="mail">Email:</label><br>
                    <input type="email" name="mail" id="mail" required>
                </div>
                <div class="col-md-6">
                    <label for="psswd">Password:</label><br>
                    <input type="password" name="psswd" id="psswd" required minlength="8"><br>
                    <label for="conf-psswd">Confirm Password:</label><br>
                    <input type="password" name="conf-psswd" id="conf-psswd" required minlength="8">
                </div>
            </div>

            <h2>Payment Information</h2>
            <hr>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="card-number">Card Number:</label><br>
                    <input type="text" name="card-number" maxlength="16" required><br>
                    <label for="card-expire">Card Expiration Date:</label><br>
                    <input type="text" name="card-expire" id="card-expire" required>
                </div>
                <div class="col-md-6">
                    <label for="card-cvc">Security Code (CVC):</label><br>
                    <input type="password" name="card-cvc" id="card-cvc" maxlength="4" required><br>
                </div>
            </div>
            <div class="btn-container">
                <button class="btn" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    
</body>
</html>