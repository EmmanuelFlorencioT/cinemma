<?php
    require "./connect_db.php";
    require "./session.php";

    $em = $_POST['mail'];
    $ps = $_POST['psswd'];

    $stmt = mysqli_prepare($connection, "SELECT * FROM User WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $em, $ps);

    //Create a dictionary or associative array
    $response = array('authenticated' => false);
    
    try{
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $email, $psswd, $c_num, $c_exp, $c_cvc);
        if(mysqli_stmt_fetch($stmt)){ //The DB found a match
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $name;

            $response['authenticated'] = true;
        } else {
            $response['errorMessage'] = "Invalid Credentials!";
        }
    } catch(Exception $e){
        $response['errorMessage'] = $e->getMessage();
    }

    //Send a JSON file as a response for the authentication request
    header("Content-Type: application/json");
    echo json_encode($response);
?>