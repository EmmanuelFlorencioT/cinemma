<?php
    require_once "./connect_db.php";
    require "./session.php";

    $movieID = (int)$_GET['id'];
    $start_time = $_POST['time'];
    $theatre_num = (int)$_POST['theatre'];

    $stmt = mysqli_prepare($connection, "INSERT INTO Screening (movie_id, start_time, screen) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isi", $movieID, $start_time, $theatre_num);
    $q_status = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    if($q_status){
        header("Location: http://localhost:5002/admin-index.php");
    } else {
        header("Location: http://localhost:5002/admin-movie.php?id=".$movieID."&error=Error creating the screening"); 
    }
?>