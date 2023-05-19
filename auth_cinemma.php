<?php
    require "./connect_db.php";
    require "./session.php";

    $em = $_POST['mail'];
    $ps = $_POST['psswd'];

    $stmt = mysqli_prepare($connection, "SELECT * FROM User WHERE email=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $em, $ps);
    
    try{
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $email, $psswd, $c_num, $c_exp, $c_cvc);
        if(mysqli_stmt_fetch($stmt)){ //The DB found a match
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $name;
            header("Location: http://localhost:5002/index.php");
        } else {
            echo "User not found!";
        }
    } catch(Exception $e){
        echo "There was a problem with the execution".$e;
    }
?>