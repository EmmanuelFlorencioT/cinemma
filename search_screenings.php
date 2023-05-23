<?php
    require './connect_db.php';

    $movieID = (int)$_GET['id'];
    $start_times = array();

    $stmt = mysqli_prepare($connection, "SELECT start_time FROM Screening WHERE movie_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $movieID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $st_time);

    while(mysqli_stmt_fetch($stmt)){
        //Append all the start times for the movie
        array_push($start_times, $st_time);
    }

?>