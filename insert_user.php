<?php
    require_once "./connect_db.php";
    require "./session_start.php";

    $name = $_POST['name'];
    $email = $_POST['mail'];
    $psswd = $_POST['psswd'];
    $card_num = $_POST['card-number'];
    $card_exp = $_POST['card-expire'];
    $card_cvc = $_POST['card-cvc'];

    $stmt = mysqli_prepare($connection, "INSERT INTO User (name, email, password, card_number, card_expiration_date, security_code) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $psswd, $card_num, $card_exp, $card_cvc);
    $q_status = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if($q_status){
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $name;
        header("Location: http://localhost:5002/index.php");
    } else {
        header("Location: http://localhost:5002/signup.php?error=Sign Up Error. Try again later.");
        
    }
?>