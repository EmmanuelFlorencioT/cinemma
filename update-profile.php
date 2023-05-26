<?php
    require_once './session.php';
    require './modify_user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Cinemma - Update your profile</title>
</head>
<body>
    <nav class="navbar bg-danger" data-bs-theme="dark">
        <div class="container-fluid">
          <!--Placeholder for the logo image-->
          <a class="navbar-brand" href="./index.php">
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
    
    <div class="signup-form">
        <form id="updateForm" action="./modify_user.php" method="POST">
            <h2>Account Settings</h2>
            <hr>

            <h4>Personal Info.</h4>

            <div>
                <label for="name">Name:</label><br>
                <input type="text" name="name" value="<?php echo $qName; ?>"><br>
                <label for="mail">Email:</label><br>
                <input type="email" name="mail" id="mail" value="<?php echo $qEmail; ?>">

                <label for="psswd">Password:</label><br>
                <input disabled type="password" name="psswd" id="psswd"><br> <!-- Change the attribute with JS and a button -->
                <label for="conf-psswd">Confirm Password:</label><br>
                <input disabled type="password" name="conf-psswd" id="conf-psswd">
            </div>

            <br>
            <h4>Payment Info.</h4>

            <div>
                <label for="card-number">Card Number:</label><br>
                <input type="text" name="card-number" maxlength="16" value="<?php echo $qCardNum; ?>"><br>
                <label for="card-expire">Card Expiration Date:</label><br>
                <input type="text" name="card-expire" id="card-expire" value="<?php echo $qCardExp; ?>">
                <label for="card-cvc">Security Code (CVC):</label><br>
                <input disabled type="password" name="card-cvc" id="card-cvc" maxlength="4"><br>
            </div>

            <div class="btn-container">
                <button class="btn" type="button" id="update-btn">Update</button>
            </div>
        </form>  
      </div>

      <div class="modal-container no-click" id="updtModalContainer">
        <div class="modal-content no-click" id="updtModalContent">
            <h3>Are you sure you want to continue?</h3>
            <p>Verify the data is correct. All the changes will take effect immediately.</p>

            <div>
                <div type="button" class="btn" id="confirm">Confirm</div>
                <div type="button" class="btn" id="cancel">Cancel</div>
            </div>
        </div>
      </div>

      <script src="./update-profile.js"></script>
    </body>
</html>