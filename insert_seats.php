<?php
    require_once "./connect_db.php";
    require_once "./session.php";

    $resp = array('wasReceived' => false);

    //Extract the raw JSON data sent through the HTTP request
    $requestData = json_decode(file_get_contents('php://input'), true);

    if(isset($requestData['screeningID'])&& isset($requestData['seats'])){
        //Insertion into the Seat table
        $resp['wasReceived'] = true;
        $scrId = (int)$requestData['screeningID'];
        $availability = 0;

        $newIds = array();

        foreach($requestData['seats'] as $seat){
            $stmt = mysqli_prepare($connection, "INSERT INTO Seat (screening_id, seat_number, is_available) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "isi", $scrId, $seat, $availability);
            mysqli_execute($stmt);
            //Bind the results in the statement to retreive the newly generated seat id
            $newId = mysqli_insert_id($connection); //Fetch that last newly AUTO_INCREMENT generated id
            $newIds[] = $newId;
        }
        mysqli_stmt_close($stmt);

        //Insertion into the Purchase table
        $usrId = (int)$_SESSION['user_id'];
        $price = (int)$requestData['price'];
        $purchaseDate = $requestData['purchaseDate'];

        foreach($newIds as $insertedSeat){
            $seatId = (int)$insertedSeat;
            $stmt = mysqli_prepare($connection, "INSERT INTO Purchase (user_id, screening_id, seat_id, price, purchase_date) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "iiiis", $usrId, $scrId, $seatId, $price, $purchaseDate);
            mysqli_execute($stmt);
        }

        mysqli_stmt_close($stmt);
    }

    header("Content-Type: application/json");
    echo json_encode($resp);
?>