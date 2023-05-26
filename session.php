<?php
    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
            return true;
        }
        return false;
    }

    function isAdmin(){
        if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0){
            return true;
        }
        return false;
    }
?>