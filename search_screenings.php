<?php
    require './connect_db.php';

    $movieID = (int)$_GET['id'];
    $screenings = array();

    $stmt = mysqli_prepare($connection, "SELECT screening_id, start_time FROM Screening WHERE movie_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $movieID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $scr_id, $st_time);

    while(mysqli_stmt_fetch($stmt)){
        //Append pairs of screening_id, start_time values into a screenings array
        $screening = array(
            'screening_id' => $scr_id,
            'start_time' => $st_time
        );

        $screenings[] = $screening;
    }

?>