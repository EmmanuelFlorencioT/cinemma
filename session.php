<?php
    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
            return true;
        }
        return false;
    }

    function authenticateUser($email, $password){
        // Logic for authentication through SQL
        // Look for the email in the database, and the password, if I find that they are equal
        // then $_SESS['username'] = $name; and $_SESS['logged_in'] = true;
    }
?>