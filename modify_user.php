<?php
    require './connect_db.php';
    require_once './session.php';

    if(isLoggedIn() && !isAdmin()){
        $u_id = $_SESSION['user_id'];
        $stmtQ = mysqli_prepare($connection, "SELECT * FROM User WHERE user_id = ?");
        mysqli_stmt_bind_param($stmtQ, "s", $u_id);
        mysqli_stmt_execute($stmtQ);
        mysqli_stmt_bind_result($stmtQ, $qId, $qName, $qEmail, $qPsswd, $qCardNum, $qCardExp, $qCardCVC);
        mysqli_stmt_fetch($stmtQ);
        mysqli_stmt_close($stmtQ);
    }

    //Check for the form submission with POST method
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $response = array('Message' => 'Update still not done');

        $name = $_POST['name'];
        $email = $_POST['mail'];
        $card_num = $_POST['card-number'];
        $card_exp = $_POST['card-expire'];

        
        if(isset($_POST['psswd']) && isset($_POST['card-cvc'])){ //Both password and security code were changed
            $psswd = $_POST['psswd'];
            $card_cvc = $_POST['card-cvc'];
            
            $update_stmt = mysqli_prepare($connection, "UPDATE User SET name = ?, email = ?, password = ?, card_number = ?, card_expiration_date = ?, security_code = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($update_stmt, "sssssss", $name, $email, $psswd, $card_num, $card_exp, $card_cvc, $u_id);
        } elseif(isset($_POST['psswd'])){ //The value that was changed was the password
            $psswd = $_POST['psswd'];

            $update_stmt = mysqli_prepare($connection, "UPDATE User SET name = ?, email = ?, password = ?, card_number = ?, card_expiration_date = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($update_stmt, "ssssss", $name, $email, $psswd, $card_num, $card_exp, $u_id);
        } elseif(isset($_POST['card-cvc'])) { //The value that was changed was the security code
            $card_cvc = $_POST['card-cvc'];
            
            $update_stmt = mysqli_prepare($connection, "UPDATE User SET name = ?, email = ?, card_number = ?, card_expiration_date = ?, security_code = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($update_stmt, "ssssss", $name, $email, $card_num, $card_exp, $card_cvc, $u_id);
        } else {
            $update_stmt = mysqli_prepare($connection, "UPDATE User SET name = ?, email = ?, card_number = ?, card_expiration_date = ? WHERE user_id = ?");
            mysqli_stmt_bind_param($update_stmt, "sssss", $name, $email, $card_num, $card_exp, $u_id); 
        }

        mysqli_execute($update_stmt);

        if(mysqli_stmt_affected_rows($update_stmt) > 0){
            $response['Message'] = 'Update successful';
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $name;

            header("Content-Type: application/json");
            echo json_encode($response);
            exit();
        }

    }
?>