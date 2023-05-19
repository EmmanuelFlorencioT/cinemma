<?php
    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
            return true;
        }
        return false;
    }
?>