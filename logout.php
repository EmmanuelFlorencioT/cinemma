<?php
    require "./session.php";

    $_SESSION['logged_in'] = false;
    unset($_SESSION['username']);
    unset($_SESSION['email']);

    session_destroy();

    header("Location: http://localhost:5002/index.php");
?>