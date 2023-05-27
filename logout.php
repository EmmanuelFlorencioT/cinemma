<?php
    require "./session.php";

    $_SESSION['logged_in'] = false;
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    if(isAdmin()){
        unset($_SESSION['admin_id']);
    } else {
        unset($_SESSION['user_id']);
    }

    session_destroy();

    header("Location: http://localhost:5002/index.php");
?>