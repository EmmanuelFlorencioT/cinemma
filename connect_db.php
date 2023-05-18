<?php
    require './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $user = "root";
    $password = $_ENV['DB_PSSWD'];
    $host = "localhost";
    $database = "cinemmadb";

    $connection = mysqli_connect($host, $user, $password, $database);
    
?>