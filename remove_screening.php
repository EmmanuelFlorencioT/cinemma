<?php
    require_once "./connect_db.php";
    require "./session.php";
    
    $resp = array('wasReceived' => false);
    $resp['deleteStatus'] = false;

    //Extract the raw JSON data sent through the HTTP request
    $requestData = json_decode(file_get_contents('php://input'), true);

    if(isset($requestData['screening_id']) && isset($requestData['start_time'])){
        $resp['wasReceived'] = true;

        $id = (int)$requestData['screening_id'];
        $time = $requestData['start_time'];

        try{
            //Delete the Seat references to the screening
            $stmt_seat = mysqli_prepare($connection, "DELETE FROM Seat WHERE screening_id = ?");
            mysqli_stmt_bind_param($stmt_seat, "i", $id);
            mysqli_stmt_execute($stmt_seat);
            //Delete the Purchase references to the screening
            $stmt_purchase = mysqli_prepare($connection, "DELETE FROM Purchase WHERE screening_id = ?");
            mysqli_stmt_bind_param($stmt_purchase, "i", $id);
            mysqli_stmt_execute($stmt_purchase);
        } catch(Exception $e){
            $resp['error'] = $e -> getMessage();
        }


        $stmt = mysqli_prepare($connection, "DELETE FROM Screening WHERE screening_id = ? AND start_time = ?");
        mysqli_stmt_bind_param($stmt, "is", $id, $time);
        mysqli_stmt_execute($stmt);

        if(mysqli_stmt_affected_rows($stmt) > 0){ //The deletion was done successfully.
            $resp['deleteStatus'] = true;
        }

    }

    header("Content-Type: application/json");
    echo json_encode($resp);
?>