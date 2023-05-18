<?php
    require_once "./connect_db.php";

    $name = $_POST['name'];
    $psswd = $_POST['psswd'];
    $card_num = $_POST['card-number'];
    $card_exp = $_POST['card-expire'];
    $card_cvc = $_POST['card-cvc'];

    $insert = "INSERT INTO User VALUES (".$name.", ".$email.", ".$psswd.", ".$card_num.", ".$card_exp.", ".$card_cvc.");";

    echo $insert;

    try{
        mysqli_query($connection, $insert);
        echo "Insert Success!";
    }catch(Exception $e){
        echo "There has been a problem: ".$e;
    }
?>