<?php
    require_once "./connect_db.php";

    $resp = array('wasReceived' => false);

    //Extract the raw JSON data sent through the HTTP request
    $requestData = json_decode(file_get_contents('php://input'), true);

    if(isset($requestData['screeningID'])&& isset($requestData['seats'])){
        $resp['wasReceived'] = true;
        $scr_id = (int)$requestData['screeningID'];
        $availability = 0;
        foreach($requestData['seats'] as $seat){
            $stmt = mysqli_prepare($connection, "INSERT INTO Seat (screening_id, seat_number, is_available) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "isi", $scr_id, $seat, $availability);
            mysqli_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    header("Content-Type: application/json");
    echo json_encode($resp);
?>