<?php 
    $logged = false;
    if(!isset($_SESSION))
        session_start();

    /*if(!isset($_SESSION['user'])){
        header('Location:hw1_login.php');
        exit;
    }else{
        echo "<script src = 'checkOut_cart.js' defer></script>";
    } */   


    if(isset($_SESSION['user'])){
        $logged = true;        
    }
    echo json_encode($logged);
?>