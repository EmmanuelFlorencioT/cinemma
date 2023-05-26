<?php
    require_once './connect_db.php';

    $screeningId = (int)$_GET['screening']; //This works!

    $occupiedSeats = array();

    $stmt = mysqli_prepare($connection, "SELECT seat_number FROM Seat WHERE screening_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $screeningId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $occupSeat);

    while(mysqli_stmt_fetch($stmt)){
        $occupiedSeats[] = $occupSeat; //Append all occupied seats
    }

?>