<?php
    require './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if(!isset($_GET['id'])){
        header("Location: http://localhost:5002/error.php");
    }

    $movieId = $_GET['id'];

    $curl = curl_init();

    $api_key = $_ENV['API_KEY'];

    curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/".$movieId."?language=en-US",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer ".$api_key,
        "accept: application/json"
    ],
    ]);

    $movieInfo = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
?>