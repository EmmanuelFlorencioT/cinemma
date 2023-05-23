<?php
    require "./connect_db.php";
    require "./session.php";

    $em = $_POST['mail'];
    $ps = $_POST['psswd'];

    $stmt = mysqli_prepare($connection, "SELECT * FROM User WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $em, $ps);

    //Create a dictionary or associative array
    $response = array('userIn' => false);
    
    try{
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $email, $psswd, $c_num, $c_exp, $c_cvc);
        if(mysqli_stmt_fetch($stmt)){ //The DB found a user match
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $name;
            $_SESSION['email'] = $email;

            $response['userIn'] = true;
            $response['adminIn'] = false;
        } else { //Check if the user is admin
            $admin_stmt = mysqli_prepare($connection, "SELECT * FROM Admin WHERE email=? AND password=?");
            mysqli_stmt_bind_param($admin_stmt, "ss", $em, $ps);
            mysqli_stmt_execute($admin_stmt);
            mysqli_stmt_bind_result($admin_stmt, $id, $name, $email, $psswd);
            if(mysqli_stmt_fetch($admin_stmt)){ //The DB found an admin match
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['email'] = $email;

                $response['userIn'] = false;
                $response['adminIn'] = true;
            } else { //There were no coincidences
                $response['errorMessage'] = "Invalid Credentials!";
            }
        }
    } catch(Exception $e){
        $response['errorMessage'] = $e->getMessage();
    }

    //Send a JSON file as a response for the authentication request
    header("Content-Type: application/json");
    echo json_encode($response);
?>